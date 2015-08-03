"First Name","Last Name","School Year","Age","Group","Contact Name","Contact Number","Activity 1","Activity 2","Activity 3","Photos Permitted","Outings Permitted","Notes"
@foreach($bookings as $booking)
"{{ 
    $booking->first
}}","{{ 
    $booking->last
}}","{{ 
    $booking->school_year
}}","{{ 
    $booking->age
}}","{{ 
    $booking->group_name
}}","{{ 
    $booking->contact_name
}}"," {{ 
    $booking->contact_number
}}","{{ 
    $booking->activity_1
}}","{{ 
    $booking->activity_2
}}","{{ 
    $booking->activity_3 
}}","{{ 
    $booking->photos_permitted ? 'Yes' : 'No'
}}","{{ 
    $booking->outings_permitted ? 'Yes' : 'No'
}}","{{ 
    $booking->notes 
}}"
@endforeach