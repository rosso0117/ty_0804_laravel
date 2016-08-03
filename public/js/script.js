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


  $('#calcButton').on('click', function(e) {
    var userName = $('#userName').val();
    var userWeight = $('#userWeight').val();
    var userDrinkCaffeine = $('#userDrink').val();

    if (userName == '' || userWeight == '' || userDrinkCaffeine == '') {
      $(this).attr('data-target', '');
    } else {
      $(this).attr('data-target', '#calcModal')
    }
  });

  $('#calcModal').on('show.bs.modal', function(e) {
    // 変数定義
    var userName = $('#userName').val();
    var userWeight = $('#userWeight').val();
    var userDrinkCaffeine = $('#userDrink').val();
    var userDrinkName = $('#userDrink option:selected').text();
    var userCaffeineLimit = userWeight * 6.5;
    var drinkLimit = (userCaffeineLimit / userDrinkCaffeine);

    //html出力
    var resultText = userName + "さんの摂取目安量は" + '<br>'
     + '<h3><span class="caffeineLimitTimer text-danger">0.0</span>' + ' mg / day</h3><br>'
      + userDrinkName + '換算だと' + '<br>'
      + '<h3><span class="drinkLimitTimer text-danger">0.0</span> 杯(本)まで</h3>';
    $('#resultText').html(resultText);

    // タイマーを設定する
    $('.caffeineLimitTimer').countTo(userCaffeineLimit, {
      "decimals": 1,
      "duration": 2
    });

    $('.drinkLimitTimer').countTo(drinkLimit, {
      "decimals": 1,
      "duration": 1
    });

  });
});
