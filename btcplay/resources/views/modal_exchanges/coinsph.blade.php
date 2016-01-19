<div id="modal_coinsph" class="modal fade" tabindex="-1" data-width="760">
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">{{ $prices['coinsph']['exchange'] }} Exchange</h4>
     </div>
    <div class="modal-body">
        <div class="row">
           <div class="clearfix">                                  
              <div class="panel panel-primary">
                 <!-- Default panel contents -->
                 <div class="panel-heading">
                    <h3 class="panel-title">Exchange Information</h3>
                 </div>
                 <div class="panel-body">
                    <p>A better way to send money Coins.ph is a quick way to transfer cash, pay bills, and load your phone</p>
                 </div>
                 <!-- List group -->
                 <ul class="list-group">
                 <li class="list-group-item">Day Change<span class="badge badge-success coinsph-daychange">{{ rand(1,10) }}.{{rand(10,99)}}%</span></li>
                 <li class="list-group-item">Currency<span class="badge badge-default">{{ $prices['coinsph']['quote']['currency'] }}</span></li>
                 <li class="list-group-item">Ask<span class="badge badge-info coinsph-ask">{{ $prices['coinsph']['quote']['ask'] }}</span></li>
                 <li class="list-group-item">Bid<span class="badge badge-info coinsph-bid">{{ number_format( $prices['coinsph']['quote']['bid'],2) }}</span></li>
                 <!--
                    <li class="list-group-item">Cras justo odio <span class="badge badge-default">3</span></li>
                    <li class="list-group-item">Dapibus ac facilisis in <span class="badge badge-success">11</span></li>
                    <li class="list-group-item">Morbi leo risus <span class="badge badge-danger">new</span></li>
                    <li class="list-group-item">Porta ac consectetur ac <span class="badge badge-warning">4</span></li>
                    <li class="list-group-item">Vestibulum at eros <span class="badge badge-info">3</span></li>
                    <li class="list-group-item">Vestibulum at eros</li>
                    -->
                 </ul>
              </div>
           </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>                            
    </div>
</div>