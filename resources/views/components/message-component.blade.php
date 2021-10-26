<div class="messageToggler position-fixed bottom-0 end-0 d-flex align-items-center justify-content-center" onclick="showMessageBox()" onmouseleave="hideMessageBox()">
   <i class="fas fa-inbox text-white"></i>
   <div class="messageTogglerTitle mb-0 ms-3 text-white">
       <div class="d-flex justify-content-between align-items-center" style="width: 270px">
           <span>Message</span>
           <i class="text-white fas fa-chevron-up"></i>
       </div>
   </div>


   <script>
       function hideMessageBox(){
        const messageBox = document.querySelector('.messageBox')
           messageBox.classList.remove('show')
       }
       function showMessageBox(){
        const messageBox = document.querySelector('.messageBox')
           messageBox.classList.toggle('show')
       }
   </script>

   <div class="messageBox overflow-auto bg-white position-absolute w-100 border " style="height: 450px; cursor: auto;">
        {{-- <div class="header w-100" style="height: 100px; background: #eeeef0">
            <h4 class="text-center text-dark pt-3" style="white-space: nowrap">Hubungi admin</h4>
        </div> --}}
        {{-- <div class="conversation mx-3 bg-white rounded shadow-sm p-3" style="margin-top: -20px; ">
            <h5>Conversation</h5>
            <a href="" class="mt-3 reportLink">
                <div class="row align-items-center rounded">
                    <div class="col-3">
                        <img src="https://tawk.link/521727297ca1334016000005/var/trigger-images/97d9e4b53b33ddaf4dd9eb3adf573fa7e2b66492.jpg" width="100%">
                    </div>
                    <div class="col-9">
                        <p class="text-muted">Report Bug dan dapatkan hadiah dari kami</p>
                    </div>
                </div>
            </a>
        </div> --}}
        <div class="messageChatt mt-0 pb-4" style="background: #eeeef0;">
            <br>
            @foreach ($messages as $message)
                <div class="messageChattList shadow p-3 mb-3 position-relative bg-white mx-4 rounded">
                    <h6>{{$message->subject}}</h6>
                    <small>{{$message->message}}</small>
                    <br>
                    <small class="text-muted text-end d-block">{{$message->created_at->diffForHumans()}}</small>
                </div>
            @endforeach
        </div>
   </div>
</div>