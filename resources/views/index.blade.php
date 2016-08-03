@extends('frames.main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
@section('content')
<div class="jumbotron">
  <div class="container">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1" id="freud">
        Caffeine<br>
        C8H10N4O2
      </div>
    </div>
  </div>
</div>

<div class="container" id="about">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
      <h1 class="">
        <span class="glyphicon glyphicon-book"></span>
        カフェインとは
      </h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
      <blockquote cite="https://ja.wikipedia.org/wiki/カフェイン">
        <p>カフェイン（英: caffeine, 独: Coffein）は、アルカロイドの1種であり、
          プリン環を持ったキサンチンの誘導体として知られている。
          興奮作用を持ち精神刺激薬のひとつである。
          <small><cite title="カフェイン - Wikipedia">カフェイン - Wikipedia</cite></small>
        </p>
      </blockquote>
    </div>
  </div>
</div>

<div class="container" id="utility">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
      <h1>
        <span class="glyphicon glyphicon-warning-sign"></span>
        作用
      </h1>
    </div>
    <div class="col-sm-10 col-sm-offset-1">
      <ul>
        <li>
          <p>覚醒作用 - 中枢神経の刺激により起こる</p>
        </li>
        <li>
          <p>強心作用 - 中枢神経の刺激により起こる</p>
        </li>
        <li>
          <p>解熱鎮痛作用</p>
        </li>
        <li>
          <p>利尿作用</p>
        </li>
      </ul>
    </div>
  </div>
</div>

<div class="container" id="contain">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
      <h1>
        <span class="glyphicon glyphicon-cutlery"></span>
        カフェインを含む飲料
      </h1>
    </div>
    <div class="col-sm-10 col-sm-offset-1">
      <table class="table">
        <thead>
          <tr>
            <th>飲料</th>
            <th>数量</th>
            <th>含有量</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($drinks as $drink)
          <tr>
            <td>{{$drink->name}}</td>
            <td>{{$drink->quantity}}ml</td>
            <td>{{$drink->caffeine}}mg</td>
          </tr>
          @empty
          <tr>
            <td>空です</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <div class="col-sm-10 col-sm-offset-1">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#graph">
        グラフを見る
      </button>
      <div class="modal fade" id="graph" tabindex="-1" role="dialog" aria-labelledby="cRateLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="閉じる"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="cRateLabel">カフェイン含有率</h4>
            </div>
            <div class="modal-body">
              <canvas id="cRateGraph" width="300" height="300">
                <!-- graph.jsにcRateJsonをわたして、js内で初期化 -->
                <script id="graphScript" src="js/cRateGraph.js" cRateJson={{$cRateJson}}>
                </script>
              </canvas>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
            </div>
          </div>
        </div>
      </div><!-- /modal -->
    </div><!-- /btn -->
  </div>
</div><!-- /container -->

<div class="container" id="intake">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
      <h1>
        <span class="glyphicon glyphicon-heart"></span>
        摂取量目安計算
      </h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
      <div class="well bs-component">
        <form id="calcForm" name="calcForm" role="form">
          <fieldset>
            <legend>入力フォーム</legend>
            <div class="form-group">
              <div class="row">
                <label for="userName" class="col-sm-2 control-label">名前</label>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <input type="text" class="form-control validate[required]" id="userName" placeholder="名前を入力してください">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label for="userWeight" class="col-sm-2 control-label">体重(kg)</label>
              </div>
              <div class="row">
                <div class="col-sm-2">
                  <input type="number" name="userWeight" class="form-control validate[required]" id="userWeight" placeholder="0" min="0">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label for="userDrink" class="col-sm-2 control-label">飲み物</label>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <select name="userDrink" id="userDrink" class="form-control">
                    @forelse ($drinks as $drink)
                    <option value="{{$drink->caffeine}}">{{$drink->name}}</option>
                    @empty
                    <option value="">空</option>
                    @endforelse
                  </select>
                </div>
              </div>
            </div><!-- /.form-group(drink) -->
            <div class="form-group">
              <div class="row">
                <div class="col-sm-4 pull-left">
                  <button type="button" class="btn btn-primary" id="calcButton" data-toggle="modal" data-target="#calcModal">
                    計算する
                  </button>
                  <div class="modal fade" id="calcModal" tabindex="-1" role="dialog" aria-labelledby="calcLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header bg-primary">
                          <button type="button" class="close" data-dismiss="modal" aria-label="閉じる"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="calcLabel">計算結果</h4>
                        </div>
                        <div class="modal-body">
                          <div id="resultText" class="col-sm-10 col-sm-offset-2"></div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                        </div>
                      </div>
                    </div>
                  </div><!-- /.modal -->
                </div>
              </div><!-- /.form-group(button) -->
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div><!-- /.row -->
</div><!-- /.container #intake -->
@endsection
