<ul class="footer-social">
    @if ($setting->facebook !==null)
    <li><a href="{{ $setting->facebook }}" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
    @endif
    @if ($setting->twiter !==null)
    <li><a href="{{ $setting->twiter }}" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a></li>
    @endif
    @if ($setting->instagram !==null)
    <li><a href="{{ $setting->instagram }}" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a></li>
    @endif
    @if ($setting->youtube !==null)
    <li><a href="{{ $setting->youtube }}" target="_blank" class="youtube"><i class="fa fa-youtube"></i></a></li>
    @endif
    @if ($setting->linkedin !==null)
    <li><a href="{{ $setting->linkedin }}" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
    @endif
</ul>
