@section('title','Profile')

<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/stylewithoutfooter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/noscroll.css') }}">
    @include('nav.navigation')
    <div class="page_title color-white"></div>
    <div class="containerimg" id="card">
        <div class="photo">
            <img src="<?= asset('img/profile/' . $data['ppid'] . '.jpg') ?>" alt="profile">
            <div class="overlay" id="overlay">
                <div class="content">
                    <p>Change profile</p>
                </div>
            </div>
        </div>
        <form action="/profile_edit/process" method="POST">
            @csrf
            <div class="txt_field">
                <input type="text" name="name" id="name" value="{{ $data['fullname'] }}"  required>
                <span></span>
                <label for="name">Full Name</label>
            </div>

            <div class="txt_field">
                <input type="date" name="dob" id="dob" value="{{ $data['DOB'] }}" required>
                <span></span>
                <label for="dob">Date of Birth</label>
            </div>

            <div class="txt_field">
                <input type="text" name="email" id="email" value="{{ $data['email'] }}" required>
                <span></span>
                <label for="email">Email</label>
            </div>

            <div class="txt_field">
                <input type="text" name="phonenumber" id="phonenumber" value="{{ $data['phonenumber'] }}" required>
                <span></span>
                <label for="phonenumber">Phone Number</label>
            </div>

            <div class="button_field">
                Gender <br><br>
                <input type="radio" name="gender" value="M" id="M" @if ($data['gender'] == 'M')
                    checked
                @endif>
                <label for="M">Male</label>
                <input type="radio" name="gender" value="F" id="F"@if ($data['gender'] == 'F')
                checked
            @endif>
                <label for="F">Female</label>
                <input type="radio" name="gender" value="N" id='N'@if ($data['gender'] == 'N')
                checked
            @endif>
                <label for="N">Rather Not Say</label>
            </div>
            <div class="button-center2">
                <a href="javascript:history.back()">
                    <button id="cancel" class="button" type="submit">
                        Cancel Edit
                    </button>
                </a>
                <input class="button" type="submit" value="Update Profile" id="update">
            </div>
        </form>
    </div>

    <div class="modal" id="modals">
        <div class="modal_container" id="modal-container">
            <div class="modal_content">
                <div class="modal_title">
                    <h1>Change Profile Picture</h1>
                </div>

                <form action="/profile_edit/changepp" method="post">
                    <div class="picturesprofile">
                        @csrf
                        <input value="0" class="inputpp" type="radio" name="ppid" id="0" @if ($data['ppid'] == 0)
                            checked
                        @endif>
                        <label for="0"><img src="{{asset('img/profile/0.jpg')}}" alt="0"></label>
                        <input value="1" class="inputpp" type="radio" name="ppid" id="1" @if ($data['ppid'] == 1)
                            checked
                        @endif>
                        <label for="1"><img src="{{asset('img/profile/1.jpg')}}" alt="1"></label>
                        <input value="2" class="inputpp" type="radio" name="ppid" id="2" @if ($data['ppid'] == 2)
                            checked
                        @endif>
                        <label for="2"><img src="{{asset('img/profile/2.jpg')}}" alt="2"></label>
                        <br>
                        <input value="3" class="inputpp" type="radio" name="ppid" id="3" @if ($data['ppid'] == 3)
                            checked
                        @endif>
                        <label for="3"><img src="{{asset('img/profile/3.jpg')}}" alt="3"></label>
                        <input value="4" class="inputpp" type="radio" name="ppid" id="4" @if ($data['ppid'] == 4)
                            checked
                        @endif>
                        <label for="4"><img src="{{asset('img/profile/4.jpg')}}" alt="4"></label>
                        <input value="5" class="inputpp" type="radio" name="ppid" id="5" @if ($data['ppid'] == 5)
                            checked
                        @endif>
                        <label for="5"><img src="{{asset('img/profile/5.jpg')}}" alt="5"></label>
                        <br>
                        <input value="6" class="inputpp" type="radio" name="ppid" id="6" @if ($data['ppid'] == 6)
                            checked
                        @endif>
                        <label for="6"><img src="{{asset('img/profile/6.jpg')}}" alt="6"></label>
                        <input value="7" class="inputpp" type="radio" name="ppid" id="7" @if ($data['ppid'] == 7)
                            checked
                        @endif>
                        <label for="7"><img src="{{asset('img/profile/7.jpg')}}" alt="7"></label>
                        <input value="8" class="inputpp" type="radio" name="ppid" id="8" @if ($data['ppid'] == 8)
                            checked
                        @endif>
                        <label for="8"><img src="{{asset('img/profile/8.jpg')}}" alt="8"></label>
                        <br>
                        <input class="save" type="submit" value="Save" id="update">
                    </div>
                    </form>
                <button class="cancel">Cancel</button>
            </div>
        </div>
    </div>

    <script>
        var modal = document.getElementById("modals");
        var btn = document.getElementById("overlay");
        var close = document.getElementsByClassName("cancel")[0];
        var content = document.getElementById("modal-container");

        btn.onclick = function() {
          modal.style.display = "block";
          content.classList.add('open-modal');
        }

        close.onclick = function() {
          modal.style.display = "none";
        }

        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
    </script>

</x-app-layout>
