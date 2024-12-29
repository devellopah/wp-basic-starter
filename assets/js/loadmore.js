(function ($) {
	const $searchForms = $('.js-search-form')
	const $toursFilter = $('#tours-filter')
	const state = {
		baseUrl: `${location.href}`,
		paged: 1,
		search: '',
		get url() {
			return `${this.baseUrl}${this.paged > 1 ? 'page/' + this.paged + '/' : ''}?${this.search}`
		}
	}

	$.extend({
		loadmore: () => {
			const $button = $('#loadmore')
			const maxPages = $button.data('max_pages')
			let paged = $button.data('paged')

			$button.click((event) => {
				event.preventDefault();

				state.paged = ++paged

				console.log('maxPages', maxPages);
				console.log('state.url', state.url);

				$.get(state.url, function (html) {
					$('#data-wrapper').append($(html).find('#data-wrapper').html())
					$('#loadmore').replaceWith($(html).find('#loadmore'))
					$.loadmore()
				})

			});
		}
	})

	if ($searchForms.length) {
		$('.js-search-form').on('submit', function (e) {
			e.preventDefault()

			state.paged = 1
			state.search = $(e.target).serialize()

			$.get(state.url, function (html) {
				const $newWrapper = $(html).find('#data-wrapper')
				if (!$newWrapper.html().trim()) {
					$newWrapper.html(`<em>${notFoundText}</em>`)
				}
				$('#data-wrapper').replaceWith($newWrapper)
				// $('.js-reset-form').trigger('click')
				document.getElementById('tours')?.scrollIntoView({
					behavior: 'smooth'
				})
				if ($('#loadmore').length) {
					$('#loadmore').replaceWith($(html).find('#loadmore'))
				} else {
					$('#data-wrapper').after($(html).find('#loadmore'))
				}
				$.loadmore()
			})
		})

		$('.js-reset-form').on('click', function (e) {
			e.preventDefault()
			e.currentTarget.closest('form').reset()
		})
	}

	if ($toursFilter.length) {
		$toursFilter.on('submit', (e) => {
			e.preventDefault()
			state.paged = 1
			state.search = $(e.target).serialize().replace('=&', '&')
			$.get(state.url, function (html) {
				const $newWrapper = $(html).find('#data-wrapper')
				if (!$newWrapper.html().trim()) {
					$newWrapper.html(`<em>${notFoundText}</em>`)
				}
				$('#data-wrapper').replaceWith($newWrapper)
				document.getElementById('tours')?.scrollIntoView({
					behavior: 'smooth'
				})
				if ($('#loadmore').length) {
					$('#loadmore').replaceWith($(html).find('#loadmore'))
				} else {
					$('#data-wrapper').after($(html).find('#loadmore'))
				}
				$.loadmore()
			})
		})
	}

	$.loadmore()

})(jQuery)
