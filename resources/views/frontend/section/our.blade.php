<section>
    <div class="container">
      <div class="title center">
        <h4 class="upper">Some of the best.</h4>
        <h3>Our Clients<span class="red-dot"></span></h3>
        <hr>
      </div>
      <div class="section-content">
        <div class="boxes clients">
          <div class="row">
            @php
              $clients = App\Models\Client::latest()-> take(3)->get();
            @endphp
            @forelse ($clients as $item)
            @php
              $i = 1;
              if($i == 1){
                $style = 'border-right border-bottom';
                $delay = 0;
              }elseif ($i == 2) {
                $style = 'border-right border-bottom';
                $delay = 500;
              }elseif ($i == 3) {
                $style = 'border-bottom';
                $delay = 1000;
              }elseif ($i == 4) {
                $style = 'border-right';
                $delay = 0;
              }elseif ($i == 5) {
                $style = 'border-right';
                $delay = 500;
              }elseif ($i == 6) {
                $style = '';
                $delay = 1000;
              }
            @endphp
            <div class="col-sm-4 col-xs-6 {{ $style }}">
              <img src="{{ url('storage/sliders/', $item -> logo) }}" alt="" data-delay="{{ $delay }}" data-animated="true" class="client-image">
            </div>
            @php
              $i++;
            @endphp
            
            @empty
              
            @endforelse
           
          </div>
          <!-- end of row-->
        </div>
      </div>
      <!-- end of section content-->
    </div>
  </section>