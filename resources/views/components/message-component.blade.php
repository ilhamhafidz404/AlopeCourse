<div class="messageToggler position-fixed bottom-0 end-0 d-flex align-items-center justify-content-center" onclick="showMessageBox()" onmouseleave="hideMessageBox()">
   <i class="fas fa-inbox text-white"></i>
   <div class="messageTogglerTitle mb-0 ms-3 text-white">
       <div class="d-flex justify-content-between align-items-center" style="width: 270px">
           <span>Message</span>
           <i class="text-white fas fa-chevron-up" id="chevronArrow"></i>
       </div>
   </div>
   <script>
       function hideMessageBox(){
          const messageBox = document.querySelector('.messageBox')
          const fas = document.querySelector('#chevronArrow')
          messageBox.classList.remove('show')
          fas.classList.add('fa-chevron-up')
          fas.classList.remove('fa-chevron-down')
       }
       function showMessageBox(){
          const messageBox = document.querySelector('.messageBox')
          const fas = document.querySelector('#chevronArrow')
          messageBox.classList.toggle('show')
          fas.classList.toggle('fa-chevron-up')
          fas.classList.toggle('fa-chevron-down')
       }
   </script>

   <div class="messageBox overflow-auto position-absolute w-100 border " style="height: 500px; cursor: auto; background: #eeeef0;">
    
    <div class="header w-100 position-relative" style="height: 100px; background: #684bd0">
        <h4 class="text-center text-white pt-3 mb-4" style="white-space: nowrap">Conversation</h4>
        <div class="p-3 mx-3 bg-white position-absolute start-0 end-0 rounded shadow text-center">
            <a href="mailto:ilhammhafidzz@gmail.com?subject=Report%20Bug&body=Hai%20ALOPE,%20saya%20menemukan%20bug%20pada%20bagian%20(Tolong%20kasih%20tahu%20dimana%20anda%20melihat%20bug)" class="btn btn-secondary mb-2">Report Bug</a>
            <a href="mailto:ilhammhafidzz@gmail.com?subject=Report%20User&body=Hai%20ALOPE,%20saya%20menemukan%20user%20yang%20tidak%20berprilaku%20kurang%20baik%20dengan%20username(Tolong%20kasih%20tahu%20username%20user%20tersebut)" class="btn btn-secondary mb-2">Report User</a>
            @auth
              @if (auth()->user()->hasRole('banned'))
                <a href="" class="btn btn-primary mb-2">Kenapa saya di ban?</a>
              @endif
            @endauth
        </div>
    </div>
        <div class="messageChatt pb-5">
            <br><br><br>
            @auth
              @if ($messages->count())
                @foreach ($messages as $message)
                  <div class="messageChattList shadow p-3 mb-3 position-relative bg-white mx-4 rounded">
                        <h6>{{$message->subject}}</h6>
                        <small>{{$message->message}}</small>
                        <br>
                        <small class="text-muted text-end d-block">{{$message->created_at->diffForHumans()}}</small>
                  </div>
                @endforeach
              @else 
                <h5 class="text-center">Tidak ada pesan untukmu</h5>
              @endif
            @else
                <h5 class="text-center">{{$messages}}</h5>
            @endauth
        </div>
   </div>
</div>