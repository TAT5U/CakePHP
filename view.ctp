<!-- データ -->
<?php
    $eventData = [
        [
            'title' => 'イベント1',
            'start' => '2019-08-01 10:59',
            'end' => '2019-08-03 22:59',
            'color' => 'green',
            'id' => 1,
            'groupId' => 1
        ],
        [
            'title' => 'イベント2',
            'start' => '2019-08-01',
            'end' => '2019-08-06',
            'color' => 'red',
            'id' => 2,
            'groupId' => 2
        ],
        [
            'title' => 'イベント3',
            'start' => '2019-08-10 04:00',
            'end' => '2019-08-15 20:00',
            'color' => 'green',
            'id' => 3,
            'groupId' => 1
        ],
    ];
    $eventDataJson = json_encode($eventData);
?>


 <script>
  $(document).ready(function() {
    $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,basicWeek'
        },
        // 終了時間の設定
        displayEventEnd: {
            month: true,
            basicWeek: false,
            "default": true
        },
        timeFormat: 'HH:mm',
        timezone: 'Asia/Tokyo', 
        eventLimit: true,  
        slotEventOverlap: true, 
        selectHelper: true, 
        selectMinDistance: 1, 

        // コンテンツの高さ(px)
        contentHeight: 800,
		// 最初の曜日
        firstDay: 7, // 7:日曜日
        // 土曜、日曜を表示
        weekends: true,
        events: <?php echo $eventDataJson; ?>,
        // events: function(start, end, timezone, callback) 
        // {
        //    // ページロード時に表示するカレンダーデータ取得イベント
        // },
        eventClick: function(calEvent, jsEvent, view) 
        {
            alert('Event名: ' + calEvent.title + '\n' + '開始時間: ' + calEvent.start.format('YYYY-MM-DD HH:mm') + '\n' + '終了時間: ' + calEvent.end.format('YYYY-MM-DD HH:mm'));

            // 選択したイベントの枠を赤く
            $(this).css('border-color', 'red');
           // カレンダーに設定したイベントクリック時のイベント
        },
        // dayClick: function(date, jsEvent, view) {
        //    // カレンダー空白部分クリック時のイベント
        // },
        // select: function(start, end) {
        //    // カレンダー空白部分をドラッグして範囲指定した時のイベント
        // },
        // eventDrop: function(event, delta, revertFunc, jsEvent, ui, view) {
        //    // イベントをドラッグして別日に移動させた時のイベント
        // }
    });
  });

  function filter(groupId)
  {
    //   リセット
    reset();
    $('#calendar').fullCalendar('clientEvents', function(clEvent){
        if(((typeof Number(groupId.value) === 'number') && (isFinite(Number(groupId.value)))) && clEvent.groupId != groupId.value){
            //alert(groupId.value +' and ' + clEvent.groupId);
			$('#calendar').fullCalendar('removeEvents', clEvent.id);
		}
    });
  }

  function reset()
  {
        $('#calendar').fullCalendar( 'removeEvents' );
        $('#calendar').fullCalendar( 'addEventSource', <?php echo $eventDataJson; ?>);
        $('#calendar').fullCalendar( 'rerenderEvents' );
  }

  	// //イベント削除のクラス名をクリックしたときの処理
    //   $(document).click(obj,function(s){
    //     alert(s);
	// 	//フィルター内で直接処理をする
	// 	$('#calendar').fullCalendar('clientEvents', function(clEvent){
            
	// 		if(clEvent.title == eventName){
                
	// 			$('#calendar').fullCalendar('removeEvents', clEvent.title);
	// 		}
	// 	});
	// 	return false;
	// });
</script>



<?php 
    $prevGroupIdList = array();
    foreach ( $eventData as $eventData ): 
        if ( !in_array($eventData['groupId'], $prevGroupIdList) ):
?>
    <input type="button" value=<?= $eventData['groupId'] ?> onClick="filter(this)">
    <?php $prevGroupIdList[] = $eventData['groupId'] ?>
<?php 
    endif;
    endforeach; 
?>
<!-- リセット -->
<input type="button" value="リセット" onClick="filter(this)">

<!-- カレンダー表示 -->
<div id="calendar"></div>





<!-- <div class="sample1"><?= $now." => ".$time ?></div>

<table>
    <?php for ( $dataCount = -1; $dataCount < count($data); $dataCount++ ): ?>

    <?php $col = "#000000" ?>
    <tr>
        <?php if ( $dataCount < 0 ): ?>
        <th><?= __('name') ?></th>
        <th><?= __('tag') ?></th>
        <th><?= __('start') ?></th>
        <th><?= __('end') ?></th>
        <?php else: ?>
        
        <td><?= h($data[$dataCount]['name']) ?></td>
        <td bgcolor=<?= $col ?>><?= h($data[$dataCount]['tag']) ?></td>
        <td><?= h($data[$dataCount]['start']) ?></td>
        <td><?= h($data[$dataCount]['end']) ?></td>
        <?php endif; ?>
    </tr>
    <?php endfor; ?>
</table> -->
