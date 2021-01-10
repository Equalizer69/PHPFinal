$(document).ready(() => {
	$.ajax({
		method: "GET",
		url: "/api/home-songs",
		success: (data) => {
			console.log(data)
		},
		error: (error) => {
			console.log(error)
		}
	})


	$(".home_content .item span").on("click", function(e)  {
		const songId = $(this).data("id");

		fetch("/user/api/songs/favourites/create/" + songId)
			.then(response = response.json())
			.then(response => {
				alert(12)
			})
			.catch((error) => {
				alert(error)
			})

		e.preventDefault();
		return false;
	})

})