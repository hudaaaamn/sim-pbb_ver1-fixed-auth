// // SIDEBAR DROPDOWN
// const allDropdown = document.querySelectorAll('#sidebar .side-dropdown');
// const sidebar = document.getElementById('sidebar');

// allDropdown.forEach(item=> {
// 	const a = item.parentElement.querySelector('a:first-child');
// 	a.addEventListener('click', function (e) {
// 		e.preventDefault();

// 		if(!this.classList.contains('active')) {
// 			allDropdown.forEach(i=> {
// 				const aLink = i.parentElement.querySelector('a:first-child');

// 				aLink.classList.remove('active');
// 				i.classList.remove('show');
// 			})
// 		}

// 		this.classList.toggle('active');
// 		item.classList.toggle('show');

// 	})

// 	// Menambahkan event listener ke setiap elemen <li> di dalam dropdown
// })





// // SIDEBAR COLLAPSE
// const toggleSidebar = document.querySelector('nav .toggle-sidebar');
// const allSideDivider = document.querySelectorAll('#sidebar .divider');

// if(sidebar.classList.contains('hide')) {
// 	allSideDivider.forEach(item=> {
// 		item.textContent = '-'
// 	})
// 	allDropdown.forEach(item=> {
// 		const a = item.parentElement.querySelector('a:first-child');
// 		a.classList.remove('active');
// 		item.classList.remove('show');
// 	})
// } else {
// 	allSideDivider.forEach(item=> {
// 		item.textContent = item.dataset.text;
// 	})
// }

// toggleSidebar.addEventListener('click', function () {
// 	sidebar.classList.toggle('hide');

// 	if(sidebar.classList.contains('hide')) {
// 		allSideDivider.forEach(item=> {
// 			item.textContent = '-'
// 		})

// 		allDropdown.forEach(item=> {
// 			const a = item.parentElement.querySelector('a:first-child');
// 			a.classList.remove('active');
// 			item.classList.remove('show');
// 		})
// 	} else {
// 		allSideDivider.forEach(item=> {
// 			item.textContent = item.dataset.text;
// 		})
// 	}
// })




// sidebar.addEventListener('mouseleave', function () {
// 	if(this.classList.contains('hide')) {
// 		allDropdown.forEach(item=> {
// 			const a = item.parentElement.querySelector('a:first-child');
// 			a.classList.remove('active');
// 			item.classList.remove('show');
// 		})
// 		allSideDivider.forEach(item=> {
// 			item.textContent = '-'
// 		})
// 	}
// })



// sidebar.addEventListener('mouseenter', function () {
// 	if(this.classList.contains('hide')) {
// 		allDropdown.forEach(item=> {
// 			const a = item.parentElement.querySelector('a:first-child');
// 			a.classList.remove('active');
// 			item.classList.remove('show');
// 		})
// 		allSideDivider.forEach(item=> {
// 			item.textContent = item.dataset.text;
// 		})
// 	}
// })


// SIDEBAR DROPDOWN
const allDropdown = document.querySelectorAll('#sidebar .side-dropdown');
const sidebar = document.getElementById('sidebar');

allDropdown.forEach(item => {
	const a = item.parentElement.querySelector('a:first-child');
	a.addEventListener('click', function (e) {
		e.preventDefault();

		if (!this.classList.contains('active')) {
			allDropdown.forEach(i => {
				const aLink = i.parentElement.querySelector('a:first-child');

				aLink.classList.remove('active');
				i.classList.remove('show');
			})
		}

		this.classList.toggle('active');
		item.classList.toggle('show');
	});
});

// SIDEBAR COLLAPSE
const toggleSidebar = document.querySelector('nav .toggle-sidebar');
const allSideDivider = document.querySelectorAll('#sidebar .divider');

function handleSidebarState() {
	if (window.innerWidth <= 780) {
		sidebar.classList.add('hide');

		allSideDivider.forEach(item => {
			item.textContent = '-';
		});

		allDropdown.forEach(item => {
			const a = item.parentElement.querySelector('a:first-child');
			a.classList.remove('active');
			item.classList.remove('show');
		});
	} else {
		sidebar.classList.remove('hide');

		allSideDivider.forEach(item => {
			item.textContent = item.dataset.text;
		});
	}
}

handleSidebarState(); // Panggil fungsi untuk menangani status sidebar saat halaman dimuat

window.addEventListener('resize', function () {
	handleSidebarState(); // Panggil fungsi saat ukuran layar berubah
});

sidebar.addEventListener('mouseleave', function () {
	if (this.classList.contains('hide')) {
		allDropdown.forEach(item => {
			const a = item.parentElement.querySelector('a:first-child');
			a.classList.remove('active');
			item.classList.remove('show');
		});
		allSideDivider.forEach(item => {
			item.textContent = '-';
		});
	}
});

sidebar.addEventListener('mouseenter', function () {
	if (this.classList.contains('hide')) {
		allDropdown.forEach(item => {
			const a = item.parentElement.querySelector('a:first-child');
			a.classList.remove('active');
			item.classList.remove('show');
		});
		allSideDivider.forEach(item => {
			item.textContent = item.dataset.text;
		});
	}
});

toggleSidebar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');

	if (sidebar.classList.contains('hide')) {
		allSideDivider.forEach(item => {
			item.textContent = '-';
		});

		allDropdown.forEach(item => {
			const a = item.parentElement.querySelector('a:first-child');
			a.classList.remove('active');
			item.classList.remove('show');
		});
	} else {
		allSideDivider.forEach(item => {
			item.textContent = item.dataset.text;
		});
	}
});



// PROFILE DROPDOWN
const profile = document.querySelector('nav .profile');
const imgProfile = profile.querySelector('img');
const dropdownProfile = profile.querySelector('.profile-link');

imgProfile.addEventListener('click', function () {
	dropdownProfile.classList.toggle('show');
})




// MENU
const allMenu = document.querySelectorAll('main .content-data .head .menu');

allMenu.forEach(item=> {
	const icon = item.querySelector('.icon');
	const menuLink = item.querySelector('.menu-link');

	icon.addEventListener('click', function () {
		menuLink.classList.toggle('show');
	})
})



window.addEventListener('click', function (e) {
	if(e.target !== imgProfile) {
		if(e.target !== dropdownProfile) {
			if(dropdownProfile.classList.contains('show')) {
				dropdownProfile.classList.remove('show');
			}
		}
	}

	allMenu.forEach(item=> {
		const icon = item.querySelector('.icon');
		const menuLink = item.querySelector('.menu-link');

		if(e.target !== icon) {
			if(e.target !== menuLink) {
				if (menuLink.classList.contains('show')) {
					menuLink.classList.remove('show')
				}
			}
		}
	})
})





// PROGRESSBAR
const allProgress = document.querySelectorAll('main .card .progress');

allProgress.forEach(item=> {
	item.style.setProperty('--value', item.dataset.value)
})






// APEXCHART
var options = {
  series: [{
  name: 'Total Pendapatan PBB',
  data: [31, 40, 28, 51, 42, 109, 100]
}, {
  name: 'Total PBB Terbayar',
  data: [11, 32, 45, 32, 34, 52, 41]
}, {
	name: 'Total PBB Belum Terbayar',
	data: [14, 35, 50, 37, 38, 60, 70]
} ],
  chart: {
  height: 350,
  type: 'area'
},
dataLabels: {
  enabled: false
},
stroke: {
  curve: 'smooth'
},
xaxis: {
  type: 'datetime',
  categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
},
tooltip: {
  x: {
    format: 'dd/MM/yy HH:mm'
  },
},
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();


// VALIDATION FORM
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
	'use strict'
  
	// Fetch all the forms we want to apply custom Bootstrap validation styles to
	var forms = document.querySelectorAll('.needs-validation')
  
	// Loop over them and prevent submission
	Array.prototype.slice.call(forms)
	  .forEach(function (form) {
		form.addEventListener('submit', function (event) {
		  if (!form.checkValidity()) {
			event.preventDefault()
			event.stopPropagation()
		  }
  
		  form.classList.add('was-validated')
		}, false)
	  })
  })()


  const getDatePickerTitle = elem => {
	// From the label or the aria-label
	const label = elem.nextElementSibling;
	let titleText = '';
	if (label && label.tagName === 'LABEL') {
		titleText = label.textContent;
	} else {
		titleText = elem.getAttribute('aria-label') || '';
	}
	return titleText;
	}

	const elems = document.querySelectorAll('.datepicker_input');
	for (const elem of elems) {
	const datepicker = new Datepicker(elem, {
		'format': 'dd/mm/yyyy', // UK format
		title: getDatePickerTitle(elem)
	});
	}