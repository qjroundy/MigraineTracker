<div class='container'>
    <div class='row'>
        <div class='col-xs-4'>#</div>
        <div class='col-xs-4'>Name</div>
        <div class='col-xs-4'>Description</div>
    </div>
    <div class='row'>
        <div class='col-xs-4'>{!! link_to_action('TriggerController@edit', $trigger->name ,$trigger->id) !!}</div>
        <div class='col-xs-4'>{{$trigger->description}}</div>
        <div class='col-xs-4'>{!! link_to_action('TriggerController@destroy', 'Remove Trigger', $trigger, ['class' => 'btn']) !!}</div>
    </div>
</div>
