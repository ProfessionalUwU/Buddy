var check = function() {
	if (document.getElementById('passwort').value ==
		  document.getElementById('passwortverify').value) {
		  document.getElementById('message').style.color = 'green';
		  document.getElementById('message').innerHTML = 'matching';
		  document.getElementById("test").style.display = "block";
	} else {
			document.getElementById('message').style.color = 'red';
		  document.getElementById('message').innerHTML = 'not matching';
		  document.getElementById("test").style.display = "none";
	}
}

$('.form').find('input, textarea').on('keyup blur focus', function(e) {
	var $this = $(this),
		label = $this.prev('label');

	if (e.type === 'keyup') {
		if ($this.val() === '') {
			label.removeClass('active highlight');
		} else {
			label.addClass('active highlight');
		}
	} else if (e.type === 'blur') {
		if ($this.val() === '') {
			label.removeClass('active highlight');
		} else {
			label.removeClass('highlight');
		}
	} else if (e.type === 'focus') {
		if ($this.val() === '') {
			label.removeClass('highlight');
		} else if ($this.val() !== '') {
			label.addClass('highlight');
		}
	}
});

$('.tab a').on('click', function(e) {
	e.preventDefault();

	$(this).parent().addClass('active');
	$(this).parent().siblings().removeClass('active');

	target = $(this).attr('href');

	$('.tab-content > div').not(target).hide();

	$(target).fadeIn(600);
});
