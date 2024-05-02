<?php
namespace App\Http\Controllers;

use App\Http\Requests\AddEventValidationRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allEvents = Event::all();
        $upcomingEvents = [];
        $events = [];
        foreach ($allEvents as $item) {
            if ($item->event_date == null || $item->event_time == '::AM' || $item->event_location == null) {
                $upcomingEvents[] = $item;
            } else {
                $events[] = $item;
            }
        }
        return view('pages.event', compact('events', 'upcomingEvents'));
    }
    public function ShowMyEvents()
    {
        $userId = Auth::user()->id;
        $events = Event::where('user_id', '=', $userId)->get();
        return view("pages.user-pages.events.my-events", compact("events"));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.user-pages.events.add-event');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(AddEventValidationRequest $request)
    {
        $formData = $request->all();
        $formData['event_approved_status'] = 0 ;
        $formData['event_time'] = $request->input('hour') . ':' . $request->input('minutes') . ':' . $request->input('meridian');
        if (!empty($formData['event_banner'])) {
            $fileName = time() . '-' . $request->file('event_banner')->getClientOriginalName();
            $path = $request->file('event_banner')->storeAs('event-images', $fileName, 'public');
            $formData['event_banner'] = '/storage/' . $path;
        } else {
            $formData['event_banner'] = null;
        }
        $event = Event::create($formData);
        return redirect()->route('pages.user.my-events')->with('eventAdded', 'Event Created Successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $timeString = $event->event_time;
        $time = explode(":", $timeString);
        return view('pages.user-pages.events.edit-event', compact('event', 'time'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(AddEventValidationRequest $request, $id)
    {
        $updateFormData = $request->all();
        $event = Event::find($id);
        $updateFormData['event_time'] = $request->input('hour') . ':' . $request->input('minutes') . ':' . $request->input('meridian');
        if (!empty($updateFormData['event_banner'])) {
            $fileName = time() . '-' . $request->file('event_banner')->getClientOriginalName();
            $path = $request->file('event_banner')->storeAs('event-images', $fileName, 'public');
            $updateFormData['event_banner'] = '/storage/' . $path;
            if ($event->event_banner != null) {
                $oldFilename = $event->event_banner;
                Storage::delete($oldFilename);
            }
        }
        $event->update($updateFormData);
        return redirect()->route('pages.user.my-events')->with('eventEdited', ' Details were updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('pages.user.my-events')->with('eventDeleted', 'Event  Deleted successfully');
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $filter = $request->input('filter');
       
        $allEvents = null;
        if ($search != null && $filter == 'name') {
            $nameFilter = Event::where(function ($query) use ($search) {
                $query->where('event_name', 'like', "%$search%")
                    ->orWhere('event_description', 'like', "%$search%");
            })->get();
            
            $allEvents = $nameFilter;
        } elseif ($search != null && $filter == 'location') {
            $locationFilter = Event::where(function ($query) use ($search) {
                $query->where('event_location', 'like', "%$search%");
            })->get();
            $allEvents = $locationFilter;
        } else {
            $dateFilter = Event::where(function ($query) use ($search) {
                $query->where('event_date', '=', $search);
            })->get();
            $allEvents = $dateFilter;
        }
        

        $upcomingEvents = [];
        $events = [];
        foreach ($allEvents as $item) {
            if ($item->event_date == null || $item->event_time == '::AM' || $item->event_location == null) {
                $upcomingEvents[] = $item;
            } else {
                $events[] = $item;
            }
        }
        return view('pages.event', compact('events', 'upcomingEvents'));
    }
}
