<a href="?app=destination">
<div class="widget widget-info widget-item-icon" onclick="location.href='pages-messages.html';">
    <div class="widget-item-left">
        <span class="fa fa-map-marker"></span>
    </div>
    <div class="widget-data">
        <div class="widget-int num-count"><?php echo $dbc->GetCount("destinations"," parent IS NULL and status > 0");?></div>
        <div class="widget-title">Destination</div>
        <div class="widget-subtitle">View</div>
    </div>     
    <!--<div class="widget-controls">  
        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
    </div>-->
</div>
</a>