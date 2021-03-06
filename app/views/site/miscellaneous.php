<?php
/* @var SiteController $this */
/* @var TestForm $model */

Yii::app()->getClientScript()->scriptMap = array(
    'bootstrap.min.css' => false,
    'bootstrap.min.js'  => false,
    'bootstrap-yii.css' => false,
);

$this->pageTitle = 'Widgets - ' . param('pageTitle');
?>
    <!-- Subhead
    ================================================== -->
    <header class="jumbotron subhead">
        <div class="container">
            <h1>Widgets</h1>

            <p class="lead">Miscellaneous Utilities</p>
        </div>
    </header>

    <div class="container">

    <!-- Docs nav
    ================================================== -->
    <div class="row-fluid">
    <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav">
            <li><a href="#box"><i class="icon-chevron-right"></i> Box</a></li>
            <li><a href="#modal"><i class="icon-chevron-right"></i> Modal</a></li>
            <li><a href="#timeago"><i class="icon-chevron-right"></i> TimeAgo</a></li>
            <li><a href="#rangeslider"><i class="icon-chevron-right"></i> RangeSlider</a></li>
        </ul>
    </div>
    <div class="span9">

    <!-- Box
        ================================================== -->
    <section id="box">

        <div class="page-header">
            <h1>Box
                <small>WhBox.php</small>
            </h1>
        </div>

        <h3>Basic Box</h3>

        <p>
            You use boxes to wrap up elements with a nice window effect. A Box is like a CPortlet type widget with the
            beauty of Bootstrap.
        </p>

        <div class="bs-docs-example">
            <?php $this->widget(
                'yiiwheels.widgets.box.WhBox',
                array(
                    'title'      => 'Basic Box',
                    'headerIcon' => 'icon-home',
                    'content'    => 'My Basic Content (you can use renderPartial here too :))'
                    // $this->renderPartial('_view')
                )
            ); ?>
        </div>

<pre class="prettyprint linenums">
&lt;?php $this-&gt;widget(&#39;yiiwheels.widgets.box.WhBox&#39;, array(
    &#39;title&#39; =&gt; &#39;Basic Box&#39;,
    &#39;headerIcon&#39; =&gt; &#39;icon-home&#39;,
    &#39;content&#39; =&gt; &#39;My Basic Content (you can use renderPartial here too :))&#39;
)); ?&gt;</pre>

        <hr class="bs-docs-separator">

        <h3>Advanced Content</h3>

        <p>Wrap any content within.</p>

        <div class="bs-docs-example">
            <?php $box = $this->beginWidget(
                'yiiwheels.widgets.box.WhBox',
                array(
                    'title'       => 'Advanced Box',
                    'headerIcon'  => 'icon-th-list',
                    // when displaying a table, if we include bootstra-widget-table class
                    // the table will be 0-padding to the box
                    'htmlOptions' => array('class' => 'bootstrap-widget-table')
                )
            );?>
            <?php $this->renderPartial('partials/_table'); ?>
            <?php $this->endWidget(); ?>
        </div>

<pre class="prettyprint linenums">
&lt;?php $box = $this-&gt;beginWidget('bootstrap.widgets.TbBox', array(
    'title' =&gt; 'Advanced Box',
    'headerIcon' =&gt; 'icon-th-list',
    // when displaying a table, if we include bootstra-widget-table class
    // the table will be 0-padding to the box
    'htmlOptions' =&gt; array('class'=&gt;'bootstrap-widget-table')
));?&gt;
&lt;?php $this-&gt;renderPartial('partials/_table');?&gt;
&lt;?php $this-&gt;endWidget();?&gt;</pre>

        <hr class="bs-docs-separator">

        <h2>Box with actions</h2>

        <p>You can also set actions to a box, so they can nicely display on its right corner as a dropdown button -<i>icon
                actions on the way :)</i></p>

        <p><span class="label label-important">Heads Up!</span> Now you can add <b>any type</b> of buttons to boxes</p>

        <div class="bs-docs-example">
            <?php
            $this->widget(
                'yiiwheels.widgets.box.WhBox',
                array(
                    'title'         => 'test',
                    'headerIcon'    => 'icon-home',
                    'headerButtons' => array(
                        TbHtml::buttonGroup(
                            array(
                                array('label' => 'Left'),
                                array('label' => 'Middle'),
                                array('label' => 'Right'),
                            )
                        ),
                        '&nbsp;',
                        TbHtml::buttonDropdown(
                            'Action',
                            array(
                                array('label' => 'Action', 'url' => '#'),
                                array('label' => 'Another action', 'url' => '#'),
                                array('label' => 'Something else here', 'url' => '#'),
                                TbHtml::menuDivider(),
                                array('label' => 'Separate link', 'url' => '#'),
                            )
                        ),
                    )
                )
            );
            ?>
        </div>
<pre class="prettyprint linenums">
&lt;?php
$this-&gt;widget(
'yiiwheels.widgets.box.WhBox',
array(
    'title'         =&gt; 'test',
    'headerIcon'    =&gt; 'icon-home',
    'headerButtons' =&gt; array(
        TbHtml::buttonGroup(
            array(
                array('label' =&gt; 'Left'),
                array('label' =&gt; 'Middle'),
                array('label' =&gt; 'Right'),
            )
        ),
        '&amp;nbsp;',
        TbHtml::buttonDropdown(
            'Action',
            array(
                array('label' =&gt; 'Action', 'url' =&gt; '#'),
                array('label' =&gt; 'Another action', 'url' =&gt; '#'),
                array('label' =&gt; 'Something else here', 'url' =&gt; '#'),
                TbHtml::menuDivider(),
                array('label' =&gt; 'Separate link', 'url' =&gt; '#'),
            )
        ),
    )
));
?&gt;</pre>
    </section>

    <!-- Modal
    ================================================== -->
    <section id="modal">

        <div class="page-header">
            <h1>Modal
                <small>WhModal.php</small>
            </h1>
        </div>

        <div class="bs-docs-example">
            <?php $this->widget(
                'yiiwheels.widgets.modal.WhModal',
                array(
                    'id'      => 'myModal',
                    'header'  => 'Modal Heading',
                    'content' => '<p>One fine body...</p>',
                    'footer'  => implode(
                        '&nbsp',
                        array(
                            TbHtml::button(
                                'Save Changes',
                                array('data-dismiss' => 'modal', 'color' => TbHtml::BUTTON_COLOR_PRIMARY)
                            ),
                            TbHtml::button('Close', array('data-dismiss' => 'modal')),
                        )
                    ),
                )
            ); ?>
            <?php echo TbHtml::button(
                'Click me to open modal',
                array(
                    'color'       => TbHtml::BUTTON_COLOR_PRIMARY,
                    'size'        => TbHtml::BUTTON_SIZE_LARGE,
                    'data-toggle' => 'modal',
                    'data-target' => '#myModal'
                )
            ); ?>
        </div>

<pre class="prettyprint linenums">
&lt;?php $this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'myModal',
    'header' => 'Modal Heading',
    'content' => '&lt;p>One fine body...&lt;/p>',
    'footer' => implode('&nbsp;', array(
        TbHtml::button('Save Changes', array(
            'data-dismiss' => 'modal',
            'color' => TbHtml::BUTTON_COLOR_PRIMARY)
        ),
        TbHtml::button('Close', array('data-dismiss' => 'modal')),
     )),
)); ?>

&lt;?php echo TbHtml::button('Click me to open modal', array(
    'style' => TbHtml::BUTTON_COLOR_PRIMARY,
    'size' => TbHtml::BUTTON_SIZE_LARGE,
    'data-toggle' => 'modal',
    'data-target' => '#myModal',
)); ?></pre>

    </section>

    <!-- TimeAgo
    ================================================== -->
    <section id="timeago">

        <div class="page-header">
            <h1>TimeAgo
                <small>WhTimeAgo.php</small>
            </h1>
        </div>

        <p>
            Timeago is a jQuery plugin that makes it easy to support automatically updating fuzzy timestamps (e.g. "4
            minutes ago" or "about 1 day ago"). For more information about its jquery plugin functionality and options, please
            visit <a href="http://timeago.yarp.com/" target="_blank">http://timeago.yarp.com/</a>.
        </p>

        <div class="bs-docs-example">
<?php $this->widget(
    'yiiwheels.widgets.timeago.WhTimeAgo',
    array(
        'date' => '2008-07-17T09:24:17Z'
    )
); ?>
        </div>

        <pre class="prettyprint linenums">
&lt;?php $this-&gt;widget(
    'yiiwheels.widgets.timeago.WhTimeAgo',
    array(
        'date' =&gt; '2008-07-17T09:24:17Z'
    )
); ?&gt;
        </pre>

        <hr class="bs-docs-separator">

        <h3>TimeAgo Format Component
            <small>
                WhTimeAgoFormatter.php
            </small>
        </h3>
        <p>
            TimeAgo comes in two flavours: a widget and a format component. The format component differs from the widget
            in that it takes a UNIX_TIMESTAMP value, making it perfect to work with database values that are goign to be
            displayed on a grid.
        </p>
        <p>
            TimeAgo format component requires that you configure it on your main.php config file. Check how it is configured
            on this site at its <a href="https://github.com/2amigos/yiiwheels-docs/blob/master/app/config/main.php#L47" target="_blank">github source code</a>.
        </p>
        <div class="bs-docs-example">
<?php $time = strtotime('-1 day'); ?>
<?php echo $time; ?>=
<?php echo Yii::app()->format->timeago($time); ?><br>
<?php $time = strtotime('-1 minute'); ?>
<?php echo $time; ?>=
<?php echo Yii::app()->format->timeago($time); ?>
        </div>

        <pre class="prettyprint linenums">
&lt;?php $time = strtotime('-1 day'); ?&gt;
&lt;?php echo $time; ?&gt;=
&lt;?php echo Yii::app()-&gt;format-&gt;timeago($time); ?&gt;&lt;br&gt;
&lt;?php $time = strtotime('-1 minute'); ?&gt;
&lt;?php echo $time; ?&gt;=
&lt;?php echo Yii::app()-&gt;format-&gt;timeago($time); ?&gt;
        </pre>
    </section>


    <!-- RangeSlider
    ================================================== -->
    <section id="rangeslider">

        <div class="page-header">
            <h1>RangeSlider
                <small>WhRangeSlider.php</small>
            </h1>
        </div>

        <p>RangeSlider implements <a href="http://ghusse.github.io/jQRangeSlider/index.html" target="_blank">jQRangeSlider</a>,
            A powerful slider for selecting value ranges, supporting dates and more.</p>

        <p>
            <span class="label label-info">Heads up</span> More examples on the way, as this is one of the most awesome
            widget at Yii Wheels.
        </p>

        <div class="bs-docs-example">
            <?php $this->widget(
                'yiiwheels.widgets.rangeslider.WhRangeSlider',
                array(
                    'id'       => 'rangeslidertest',
                    'name'     => 'rangeslidertest',
                    'delayOut' => 4000,
                    'type'     => 'editRange'
                )
            );?>
            <br>

            <div style="clear:both;height:20px"></div>
        </div>

        <pre class="prettyprint linenums">
&lt;?php $this-&gt;widget(
    'yiiwheels.widgets.rangeslider.WhRangeSlider',
    array(
        'id'       =&gt; 'rangeslidertest',
        'name'     =&gt; 'rangeslidertest',
        'delayOut' =&gt; 4000,
        'type'     =&gt; 'editRange'
    )
);?&gt;
        </pre>
    </section>

    </div>
    </div>
    </div>
<?php
// fix twitter bootstrap docs bug: https://github.com/twitter/bootstrap/issues/6832
Yii::app()->clientScript->registerScript(
    'javascript#ReadyJS',
    <<<EOD
   $('.tooltip-demo a[rel=tooltip]').tooltip();
EOD
);
