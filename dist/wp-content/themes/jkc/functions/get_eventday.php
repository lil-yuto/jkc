<?php /* イベントスケジュール開催日出力関数を読み込み */
function get_eventday($acf_ev_date, $acf_ev_holiday) {
 $event_date = date('Y年n月j日', strtotime($acf_ev_date));
 $weekary = ['日', '月', '火', '水', '木', '金', '土'];
 $acf_ev_holiday = get_field('acf_ev_holiday');
 $week = (!$acf_ev_holiday) ? '' : '･祝'; /* 祝日表示 */
 $date = date('w', strtotime($acf_ev_date));
 $week = '(' . $weekary[$date] . $week . ')';

 return $event_date . $week;
}
