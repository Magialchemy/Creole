<!-- Modal -->
<div class="modal fade" id="{{'exampleModal' . $i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">『{{$topic[$i]->word}}』の関連語句</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead>
            <tr>
              <th>単語</th>
              <th>品詞</th>
              <th>出現回数</th>
              <th>関連度</th>
            </tr>
          </thead>
          <tbody>
          @isset($planets[$i])
            @forelse($planets[$i] as $planet)
              @if($loop->index < 5)
              <tr style="background-color: pink;">
              @elseif($loop->index % 2)
              <tr style="background-color: lightcyan;">
              @else
              <tr>
              @endif
                <td>{{$planet->word}}</td>
                <td>{{$planet->forms}}</td>
                <td>{{$planet->counts}}</td>
                <td>{{floor($planet->counts / $sum[$i] *10000)/100 . '%'}}</td>
              </tr>
            @empty
            @endforelse
          @endisset
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>