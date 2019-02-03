<!-- START APP HEADER -->
<div class="app-header app-header-design-default">
    <ul class="app-header-buttons">
    </ul>
    <ul class="app-header-buttons pull-right">
        <li>
            <div class="contact contact-rounded contact-bordered contact-lg contact-ps-controls hidden-xs">
                <img src="{{asset('img/user/no-image.png')}}">
                <?php $user = session('userid');?>
                @if(isset($user))
                    <div class="contact-container"><a href="#">{{session('userNom')}}</a></div>
                @endif
            </div>
        </li>

        <li><a href="/logout" class="btn btn-default btn-icon"><span class="icon-power-switch"></span></a></li>
    </ul>
</div>
<!-- END APP HEADER  -->
