<div class="app-wrapper-footer">
    <div class="app-footer">

        <div class="app-footer__inner">

            {{-- left side content of the footer --}}
            <div class="app-footer-left">
                {{-- <ul class="nav">--}}
                    {{-- <li class="nav-item">--}}
                        {{-- <a href="javascript:void(0);" class="nav-link">--}}
                            {{-- Footer Link 1--}}
                            {{-- </a>--}}
                        {{-- </li>--}}
                    {{-- <li class="nav-item">--}}
                        {{-- <a href="javascript:void(0);" class="nav-link">--}}
                            {{-- Footer Link 2--}}
                            {{-- </a>--}}
                        {{-- </li>--}}
                    {{-- </ul>--}}
            </div>


            {{-- right side content of the footer --}}
            <div class="app-footer-right">
                <ul class="nav">

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Dashboards
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            made with love and care
                        </a>
                    </li>

                    <li class="nav-item nav-link disabled" id="date">

                    </li>
                </ul>
                <script>
                    dateId = document.getElementById("date")
                    dateId.innerHTML = new Date().getFullYear()                        
                </script>
            </div>
        </div>
    </div>
</div>