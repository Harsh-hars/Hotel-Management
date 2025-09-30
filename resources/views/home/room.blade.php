 <div class="container">
     <div class="row">
         <div class="col-md-12">
             <div class="titlepage">
                 <h2>Our Room</h2>
                 <p>Lorem Ipsum available, but the majority have suffered </p>
             </div>
         </div>
     </div>
     <div class="row g-4">
         @foreach ($data as $room)
             <div class="col-md-4 col-sm-6">
                 <div class="card h-100 shadow-lg border-0 room-card">

                     <!-- Room Image -->
                     <img src="room/{{ $room->image }}" class="card-img-top" alt="{{ $room->room_title }}"
                         style="height: 250px; object-fit: cover;">

                     <!-- Room Details -->
                     <div class="card-body d-flex flex-column">
                         <h5 class="card-title text-primary fw-bold">{{ $room->room_title }}</h5>
                         <p class="card-text text-muted" style="font-size: 14px;">
                             {!! Str::limit($room->description, 100) !!}
                         </p>
                         <div class="mt-auto">
                             <a href="{{ url('room_details', $room->id) }}" class="btn btn-outline-primary w-100">
                                 View Details
                             </a>
                         </div>
                     </div>

                 </div>
             </div>
         @endforeach
     </div>
 </div>

 <style>
     .bed_room {
         display: flex;
         flex-direction: column;
         gap: 15px;
     }
 </style>
