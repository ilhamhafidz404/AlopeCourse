<div>
    @php
        $curl= curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyBSLmlOfBhdZXTucXCXx17WmcaQWRkX0Tc&channelId=UCR0Gz3-3zuqQuuePqNq9-JA&part=snippet');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result= curl_exec($curl);
        curl_close($curl);

        $result= json_decode($result, true);
        $videoCount= $result["pageInfo"]['totalResults'];
        $items= $result['items']
    @endphp
    {{-- {{ dd($items) }} --}}
    <style>
        .text-gradient{
            background: linear-gradient(-45deg, #821FC8, #23ADD1 );
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .btn-header-card{
            border-radius: 20px;
            margin: 0 30px;
            background: linear-gradient(45deg, #594DD4, #7749CB);
            /* background-color: #bd050f; */
            border: 3px solid transparent;
            transition: 0.5s
        }
        .btn-header-card:hover{
            background: linear-gradient(-45deg, #594DD4, #7749CB);
            border-color: rgba(255, 255, 255, 0.3)
        }
        span.youtube-text{
            color: #bd171d !important;
        }
    </style>
    <div class="card text-center p-3 text-dark mx-5 mb-0 mt-4 position-relative" style="background: rgba(18, 27, 104, 0.7); border-radius: 20px; overflow: hidden">
        <img src="{{asset('image/yt-ribbon.png')}}" width="70px" class="position-absolute" style="left: -3px; top: -12px; opacity: 0.7">
        <h6 style="color: #ebebeb" class="mb-1">ALOPE Programming</h6>
        <h4 class="display-4 text-gradient mb-0 fw-bold">{{ $videoCount -1 }}</h4>
        <div class="d-flex justify-content-center">
            <span class="text-gradient me-2">video tutorial on</span>
            <span class="youtube-text fw-bold text-uppercase">youtube</span>
        </div>
        <small class="mt-4" style="color: #d4d4d4">
            Kunjungi Patreon Channel dengan klik tombol dibawah
        </small>
        <a href="https://www.youtube.com/channel/UCR0Gz3-3zuqQuuePqNq9-JA" target="_blank" class="btn btn-primary text-white btn-header-card mt-3 mb-2">
            berlangganan
        </a>
    </div>
</div>