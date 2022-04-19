console.clear();

$('.slider > .page-nav > li').click(function(){
    $this = $(this);

    $this.addClass('active');
    $this.siblings().removeClass('active');

    var index = $this.index(); // 자신이 속한 순서를 찾는다.

//    console.log($this.length);
    var slider = $this.closest('.slider'); //자신이 속한 최상위 부모를 검색
    var current = slider.find('.slides > div.active'); // 슬라이더의 active 속성을 가진 div를 검색
    var post = slider.find('.slides > div').eq(index); // 슬라이더에 index와 같은 번호인 div를 검색
    //console.log(slide.length);

    current.removeClass('active'); // active 속성을 가진 div의 class속성을 제거한다.
    post.addClass('active'); // active 속성을 가지지 않은 div의 class속성을 추가한다.

});

setInterval(function() {
    $('.slider .page-nav > li.active').each(function(index, node) {
        var $current = $(node);
        var $slider = $current.closest('.slider');

        if ( $slider.attr('data-slider-auto-work') !== 'N' ) {
            // 현재 슬라이더에 마우스가 올라간 상태가 아니라면 자동 슬라이드를 진행합니다.
            var $post = $current.next();

            if ( $post.length == 0 ) {
                $post = $current.siblings().eq(0);
            }

            // 실제로 마우스로 클릭한 효과를 재현해 냅니다.
            $post.click();
        }
    });
}, 3000);
