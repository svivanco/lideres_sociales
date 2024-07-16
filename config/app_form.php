<?php
/*return [
    'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
    'inputContainer' => '<div class="form-group">{{content}}</div>',
    'inputContainerError' => '<div class="input {{type}}{{required}} error">{{content}}{{error}}</div>',
    'label' => '<label{{attrs}}>{{text}}</label>',
    'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
    'checkboxFormGroup' => '<div class="checkbox">{{label}}</div>',
    'checkboxWrapper' => '<div>{{label}}</div>',
    'textarea' => '<textarea class="form-control" name="{{name}}"{{attrs}}>{{value}}</textarea>',
    'select' => '<select class="form-control" name="{{name}}"{{attrs}}>{{content}}</select>',
    'selectMultiple' => '<div class="btn-group bootstrap-select form-control"><select class="selectpicker" name="{{name}}[]" multiple data-live-search="true" {{attrs}}>{{content}}</select></div>',
];*/

return [
    'input'=>'<input class="form-control" type="{{type}}" name="{{name}}" {{attrs}}/>',
    'inputContainer'=>'<div class="form-group"><div class="fg-line" >{{content}}</div></div>',
    'inputContainerError' => '<div class="input {{type}}{{required}} error">{{content}}{{error}}</div>',
    'label' => '<label{{attrs}}>{{text}}</label>',


    /*'checkbox' => '
                    <div class="form-group form-material">
                        <div class="checkbox-custom checkbox-default">
                            <input type="checkbox" autocomplete="off" name="{{name}}" {{attrs}}/>
                            <label for="{{name}}">{{text}}</label>
                        </div>
                    </div>
                  ',*/
    //'checkboxFormGroup' => '<div class="form-group form-material">{{label}}</div>',
    //'checkboxWrapper' => '<div>{{label}}</div>',
//    'checkbox' => '<div class="checkbox-custom checkbox-default"><input type="checkbox" autocomplete="off" name="{{name}}"/></div>',
    'textarea' => '<textarea class="form-control" name="{{name}}"{{attrs}}>{{value}}</textarea>',
    'select' => '<select class="form-control" name="{{name}}"{{attrs}}>{{content}}</select>',
    'selectMultiple' => '<div class="form-group"><select class="form-control" name="{{name}}[]" multiple {{attrs}}>{{content}}</select></div>',
    'radioContainer'=>'<div class="form-group form-material"><div class="fg-line" >{{content}}</div></div>'
]
?>
