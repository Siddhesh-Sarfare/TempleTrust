<div class="footer mdc-bg-light-blue-800">
    <div class="container">
        {{-- <div class="row">
            <div class="owl-carousel owl-theme mt-5">
                @foreach($links as $item)
                <div class="item">
                    <a onclick="window.open(this.href,'_blank');return false;" href="https://{{ $item->link }}">
                        <img alt="india.gov.in.png" src="{{ asset("assets/backend/images/government_link_images/".$item->image_path) }}" style="width: 180px; height: 78px;">
                    </a>
                </div>
                @endforeach
            </div>
        </div> --}}
        <div style="display: flex; justify-content: center;">
        <div class="col-12 col-md-4 my-3">
            <div class="logo-title-card d-flex align-items-center mdc-text-white-darker p-4">
                <div class="logo">
                    <img src="{{ asset('assets/frontend/images/seal-of-maharashtra.png') }}" class="palghar-seal" alt="emblem" />
                </div>
                <div class="title">महसूल व वन विभाग</div>
            </div>
           
            <div style="text-align:right;">
                <h4 style="margin: 0px; font-size: 14px;">Visitor Counter</h4>
                <img src="https://counter10.stat.ovh/private/freecounterstat.php?c=bsdbk23x3p5sl53nng385wf7jmwwykqp" border="0" title="free hit counter" alt="free hit counter" height="16">                
            </div>
        </div>
        </div>
        <div class="copy-right">
            {{-- <p style="text-align:center; color:white;">Powered By <a onclick="window.open(this.href,'_blank');return false;" href="https://mahait.org/" style="color: #f7be33">MahaIT</a></p> --}}
            <p style="text-align:center; color:white;"> © <?php echo date("Y"); ?> <a onclick="window.open(this.href,'_blank');return false;" href="https://ashhwa.in/" style="color: #f7be33">Ashhwa</a></p>
        </div>
    </div>
</div>