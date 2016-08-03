$(function() {


  //ボタンactive or inactive
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
    var activatedTab = e.target;
    var previousTab = e.relatedTarget;

    $(previousTab).removeClass('active');
    $(activatedTab).addClass('active');
  });
  //スムーススクロール
  $('a').smoothScroll();

// フォームの値

//未入力ならcalcModalが表示されない
  $('#calcButton').on('click', function(e) {
    var name = $('#userName').val();
    var weight = $('#userWeight').val();
    var caff = $('#userDrink').val();

    if (name == '' || weight == '' || caff == '') {
      $(this).attr('data-target', '');
    } else {
      $(this).attr('data-target', '#calcModal')
    }
  });

  $('#calcModal').on('show.bs.modal', function(e) {
    // 変数定義
    var name = $('#userName').val();
    var weight = $('#userWeight').val();
    var caff = $('#userDrink').val();
    var drinkName = $('#userDrink option:selected').text();
    var caffLimit = weight * 6.5;
    var drinkLimit = (caffLimit / caff);

    //html出力
    var resultText = name + "さんの摂取目安量は" + '<br>'
     + '<h3><span class="caffLimitTimer text-danger">0.0</span>' + ' mg / day</h3><br>'
      + drinkName + '換算だと' + '<br>'
      + '<h3><span class="drinkLimitTimer text-danger">0.0</span> 杯(本)まで</h3>';
    $('#resultText').html(resultText);

    // タイマーを設定する
    $('.caffLimitTimer').countTo(caffLimit, {
      "decimals": 1,
      "duration": 2
    });

    $('.drinkLimitTimer').countTo(drinkLimit, {
      "decimals": 1,
      "duration": 1
    });

  });
});
