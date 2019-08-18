
 <script>
  $(document).ready(function() {
    $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month'
        },
        timeFormat: 'HH:mm',
        timezone: 'Asia/Tokyo', 
        eventLimit: true, 
        editable: true, 
        slotEventOverlap: true, 
        selectable: true, 
        selectHelper: true, 
        selectMinDistance: 1, 
        events: function(start, end, timezone, callback) 
        {
           // ページロード時に表示するカレンダーデータ取得イベント
        },
        eventClick: function(calEvent, jsEvent, view) 
        {
           // カレンダーに設定したイベントクリック時のイベント
        },
        dayClick: function(date, jsEvent, view) {
           // カレンダー空白部分クリック時のイベント
        },
        select: function(start, end) {
           // カレンダー空白部分をドラッグして範囲指定した時のイベント
        },
        eventDrop: function(event, delta, revertFunc, jsEvent, ui, view) {
           // イベントをドラッグして別日に移動させた時のイベント
        }
    });
  });
</script>



<div id="contents" class="container-fluid">
  <div class="row">
    <div class="col-xs-12">
      <div class="panel">
        <div class="panel-heading">
          スケジュール表
        </div>
        <div class="panel-body">
          <!-- メッセージ表示したい時はこの辺に -->
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"＞
              <div id="calendar"></div><!-- ここがカレンダー表示部分 -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
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
