{"filter":false,"title":"show.blade.php","tooltip":"/resources/views/posts/show.blade.php","undoManager":{"mark":8,"position":8,"stack":[[{"start":{"row":14,"column":9},"end":{"row":14,"column":71},"action":"remove","lines":["<p><a href=\"{{url($post->slug)}}\">{{url($post->slug)}}</a></p>"],"id":2},{"start":{"row":14,"column":9},"end":{"row":14,"column":90},"action":"insert","lines":["<p><a href=\"{{url('blog/'. $post->slug)}}\"> {{url('blog/'. $post->slug)}}</a></p>"]}],[{"start":{"row":13,"column":8},"end":{"row":13,"column":9},"action":"insert","lines":["<"],"id":3}],[{"start":{"row":13,"column":9},"end":{"row":13,"column":10},"action":"insert","lines":["!"],"id":4}],[{"start":{"row":13,"column":10},"end":{"row":13,"column":11},"action":"insert","lines":["-"],"id":5}],[{"start":{"row":13,"column":11},"end":{"row":13,"column":12},"action":"insert","lines":["-"],"id":6}],[{"start":{"row":15,"column":9},"end":{"row":15,"column":10},"action":"insert","lines":["-"],"id":7}],[{"start":{"row":15,"column":10},"end":{"row":15,"column":11},"action":"insert","lines":["-"],"id":8}],[{"start":{"row":15,"column":11},"end":{"row":15,"column":12},"action":"insert","lines":[">"],"id":9}],[{"start":{"row":12,"column":7},"end":{"row":16,"column":13},"action":"remove","lines":["<dl class=\"dl-horizontal\">","        <!-- <label> Url Slug:</label> ","         <p><a href=\"{{url('blog/'. $post->slug)}}\"> {{url('blog/'. $post->slug)}}</a></p>","         -->","        </dl>"],"id":11}]]},"ace":{"folds":[],"scrolltop":120,"scrollleft":0,"selection":{"start":{"row":25,"column":25},"end":{"row":25,"column":25},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":85,"mode":"ace/mode/php"}},"timestamp":1497994308696,"hash":"7d9a960c08cb2e948674f9786076c2dbd06af30b"}