<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\View;
use Illuminate\Http\Request;
use App\Http\Requests\CreateContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Carbon\Carbon;
use DateTime;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::paginate(10);
        return view('home', \compact([
            'contacts'
        ]));

        // return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateContactRequest $request)
    {
        // dd($request->image);

        if($request->image){
            $image = $request->file('image')->store('contacts');
        }
        else{
            $image=null;
        }
       
         //run command php artisan storage:link
        // dd($image);
       //craete contact
        $contact = Contact::create([
            'first_name'=>$request->first_name,
            'middle_name'=>$request->middle_name,
            'last_name'=>$request->last_name,
            'email'=>$request->category_id,
            'mobile'=>$request->mobile,
            'landline'=>$request->landline,
            'image'=>$image,
            'notes'=>$request->notes,
                     
        ]);

        session()->flash('success','Contact Created Successfully');
        //redirect

        return redirect(route('contacts.index'));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        // dd($contact);
        $totalViews = $contact->views;
        $count = $totalViews+1;
        // dd($count);
        $contact->update(array('views' => $count));


        //views Each day
        $views = View::all();
        // dd($views);
        $d = Carbon::now();
        $date = $d->format('Y-m-d');
        // dd($date);

        $viewToday=View::where('contact_id',$contact->id)
                        ->where('date',$date)->first();
        // dd($viewToday->first());
        if($viewToday==null) 
        {
            // dd($viewToday);
            $viewToday = View::create([
                'contact_id'=>$contact->id,
                'views'=>'1',
                'date'=>$date
            ]);
         }
         else{
            $totalViewsTillNow=$viewToday->views;
            // dd($totalViewsTillNow);
            $countTotalViews=$totalViewsTillNow+1;
            $viewToday->update(array('views' => $countTotalViews));
         }


         $lastSevenDaysViews = View::whereDate('created_at', Carbon::now()->subDays(1))
         ->get();
        //  dd($viewToday);

        //for the graph to get 7 days dates
        $my_dt = new DateTime($viewToday->date);
        // $week_date=$my_dt->modify('-1 day');
        // $week_date_formatted=$week_date->format('Y-m-d');
        // dd($week_date_formatted);

        $dates=array();
        $final_views = array();

        //  dd($viewToday);
        $final_views[]=$viewToday['views'];
        // dd($final_views);

        for($i=0;$i<6;$i++){
            $week_date=$my_dt->modify('-1 day');
            $week_date_formatted=$week_date->format('Y-m-d');
            $views_on_each_day=View::where('date',$week_date_formatted)->where('contact_id',$contact->id)->first();
            // dd($views_on_each_day);
            $dates[]=$week_date_formatted;
            if(!$views_on_each_day['views']){
                $final_views[]=0;
            }
            else{
                $final_views[]=$views_on_each_day['views'];
            }
        }

        // dd($final_views);

        return view('contact',compact([
            'contact','dates','final_views'
        ]));

     
    
    }

    public function display(){

        
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('edit',compact(['contact']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
    //    dd($contact);

            $data = $request->only(['first_name','middle_name', 'last_name', 'email','mobile','landline','notes']);
            if($request->hasFile('image'))
            {
                $image = $request->image->store('contacts');
                $contact->deleteImage();
                $contact['image'] = $image;
            }
            $contact->update($data);

            session()->flash('success','contact Updated Successfully!');
            return redirect(route('contacts.index'));



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        // dd($contact);
        $contact->delete();
        return redirect(route('contacts.index'));
    }
}
