(function ($) {

  $('#to-dates-scroller').on('click', function (e) {
    e.preventDefault()

    $('#availability')[0].scrollIntoView({
      behavior: 'smooth'
    })
  })

  // $.extend({
  //   hookUpProductModals: () => {

  //     $('.js-btn-success').on('click', function(e) {
  //       closeModal()
  //       setTimeout(() => {
  //         revealForm(e)
  //       }, 250);

  //     })

  //     $('.js-form-revealer').on('click', revealForm)
  //     function revealForm(e) {
  //       e.preventDefault()

  //       $blocks = $(e.currentTarget).closest('.js-form-wrapper').find('.js-form-wrapper-block')
  //       $blocks.hide()
  //       $blocks.eq(0).show()
  //     }

  //     function closeModal() {
  //       $('.modal.is--active .modal__close').trigger('click')
  //     }
  //     // product card
  //     var productCard = document.querySelectorAll('.js-product-card');
  //     var productCardBtn = document.querySelectorAll('.js-product-card-trigger');
  //     var productCardClose = document.querySelectorAll('.js-product-card-closer');
  //     var productCardSlider = document.querySelectorAll('.js-product-card-slider')

  //     if (productCard && productCardBtn && productCardClose) {
  //       productCard.forEach(function (item, i) {
  //         item.onclick = function (event) {
  //           if (event.target.classList.contains('product-card') || event.target.classList.contains('product-card__wrap')) {
  //             event.preventDefault();
  //             item.classList.remove('is--active');
  //             bodyFixScroll();
  //           }
  //         };
  //       });
  //       productCardBtn.forEach(function (item, i) {
  //         item.onclick = function (event) {
  //           event.preventDefault();
  //           document.getElementById(`product-card-${item.dataset.id}`).classList.add('is--active')
  //           bodyFixScroll(1);
  //         };
  //       });
  //       productCardClose.forEach(function (item) {
  //         item.onclick = function (event) {
  //           event.preventDefault();
  //           // document.getElementById(`product-card-${item.dataset.id}`).classList.remove('is--active')
  //           item.closest('.js-product-card').classList.remove('is--active');
  //           bodyFixScroll();
  //         };
  //       });
  //       if(productCardSlider) {
  //         productCardSlider.forEach(function(item, i) {
  //           new Swiper(item, {
  //               slidesPerView: 'auto',
  //               spaceBetween: 26,
  //               speed: 800,
  //               pagination: {
  //                   el: $(item).parent().find('.swiper-pagination')[0],
  //                   type: 'bullets',
  //                   clickable: true,
  //               },
  //               breakpoints: {
  //                   0: {
  //                       direction: 'horizontal',
  //                       spaceBetween: 19,
  //                   },
  //                   744: {
  //                       direction: 'horizontal',
  //                       spaceBetween: 28,
  //                   },
  //                   1024: {
  //                       direction: 'vertical',
  //                       spaceBetween: 26,
  //                   }
  //               }
  //           });
  //         })
  //       }
  //     }

  //     // modal
  //     var modal = document.querySelectorAll('.modal');
  //     var modalBtn = document.querySelectorAll('.modal-btn');
  //     var modalClose = document.querySelectorAll('.modal__close');
  //     var modalTimeout;
  //     if (modal && modalBtn && modalClose) {
  //       // modal
  //       modal.forEach(function (item) {
  //         item.onclick = function (event) {
  //           if (event.target.classList.contains('modal') || event.target.classList.contains('modal__wrap')) {
  //             event.preventDefault();
  //             document.querySelectorAll('.modal.is--active').forEach(function (child) {
  //               return child.classList.remove('is--active');
  //             });
  //             bodyFixScroll();
  //           }
  //         };
  //       });

  //       // modal btn
  //       modalBtn.forEach(function (item, i) {
  //         item.onclick = function (event) {
  //           event.preventDefault();
  //           var modalID = item.dataset.id;
  //           // var productCard = document.getElementById(`product-card-${modalID}`)

  //           var productCard = event.currentTarget.closest('.js-product-card')
  //           if (modalTimeout) {
  //             clearTimeout(modalTimeout);
  //           }
  //           if (productCard) {
  //             if (productCard.classList.contains('is--active')) {
  //               productCard.classList.remove('is--active');
  //             }
  //           }
  //           if (item.dataset.mobile) {
  //             if (window.innerWidth <= 743) {
  //               if (document.getElementById(modalID)) {
  //                 document.querySelectorAll('.modal.is--active').forEach(function (child) {
  //                   return child.classList.remove('is--active');
  //                 });
  //                 document.getElementById(modalID).classList.add('is--active');
  //                 bodyFixScroll(1);
  //                 if (item.dataset.temp) {
  //                   modalTimeout = setTimeout(function () {
  //                     document.querySelectorAll('.modal.is--active').forEach(function (child) {
  //                       return child.classList.remove('is--active');
  //                     });
  //                     bodyFixScroll();
  //                   }, 3500);
  //                 }
  //               }
  //             }
  //           } else {
  //             if (document.getElementById(modalID)) {
  //               document.querySelectorAll('.modal.is--active').forEach(function (child) {
  //                 return child.classList.remove('is--active');
  //               });
  //               document.getElementById(modalID).classList.add('is--active');
  //               bodyFixScroll(1);
  //               if (item.dataset.temp) {
  //                 modalTimeout = setTimeout(function () {
  //                   document.querySelectorAll('.modal.is--active').forEach(function (child) {
  //                     return child.classList.remove('is--active');
  //                   });
  //                   bodyFixScroll();
  //                 }, 3500);
  //               }
  //             }
  //           }
  //         };
  //       });

  //       // modal close
  //       modalClose.forEach(function (item) {
  //         item.onclick = function (event) {
  //           event.preventDefault();
  //           document.querySelectorAll('.modal.is--active').forEach(function (child) {
  //             return child.classList.remove('is--active');
  //           });
  //           bodyFixScroll();
  //         };
  //       });
  //     }
  //   }
  // })

  // $.hookUpProductModals()

  // forms handling
  const forms = document.querySelectorAll('.js-form');
  const validationInputs = document.querySelectorAll('[required]');

  if (forms) {
    forms.forEach(function (form) {
      form.onsubmit = handleSubmit;
    });
  }

  if (validationInputs) {
    validationInputs.forEach(function (input) {
      input.onblur = validateFieldOnBlur
    });
  }

  function handleSubmit(event) {
    event.preventDefault();
    if (validateForm(event.currentTarget)) {

      $form = $(event.currentTarget);
      $submitter = $form.find('[type=submit]');

      $submitter.prop('disabled', true)

      // $form.addClass('loading')

      let data = {
        action: $form.data('action'),
        _wpnonce: siteData.ajax_nonce,
        fields: $form.serialize()
      }

      $.ajax({
        url: siteData.ajax_url,
        data: data,
        method: "POST",
      }).done(function (data) {
        $submitter.prop('disabled', false)

        if (data.status === 'success') {
          $('.modal.is--active').removeClass('is--active')
        }

        setTimeout(() => {
          $(`#popup-application-${data.status}`).addClass('is--active')
          bodyFixScroll(1)
          $form[0].reset()
        }, 250);

        // $form
        //   .closest('.js-form-wrapper')
        //   .find('.js-form-wrapper-block').hide().end()
        //   .find(`[data-message=${data.status}]`).show()

        // $form.removeClass('loading')
        // $form.addClass('submitted');

        // $submitter.text('✅')

        setTimeout(() => {
          $form.removeClass('submitted');
          $submitter.text('Отправить')
        }, 3000);

      })

    }

  }

  $('.js-popup-closer').on('click', closePopup)
  function closePopup(e) {
    e.preventDefault()
    $(e.target).closest('.js-popup').removeClass('is--active')
    bodyFixScroll(0)
  }

  function validateFieldOnBlur(event) {
    var input = event.target;
    var parent = input.closest('.js-field');
    if (input.value.trim() !== '') {
      if (input.type === 'email' && !isValidEmail(input.value.trim())) {
        parent.classList.add('is--error');
      } else if (input.type === 'tel' && !isValidPhone(input.value.trim())) {
        parent.classList.add('is--error');
      } else {
        parent.classList.remove('is--error');
      }
    } else {
      parent.classList.add('is--error');
    }
  }

  const inputmaskInputs = document.querySelectorAll('[type="tel"]');
  const im = new Inputmask('+7 (999) 999-99-99');
  im.mask(inputmaskInputs);

  function validateForm(form) {
    var inputs = form.querySelectorAll('[required]');
    var errorElements = form.querySelectorAll('.js-field');
    errorElements.forEach(function (errorElement) {
      return errorElement.classList.remove('is--error');
    });
    var isValid = true;
    inputs.forEach(function (input) {
      var parent = input.closest('.js-field');
      if (input.value.trim() === '') {
        parent.classList.add('is--error');
        isValid = false;
      } else if (input.type === 'email' && !isValidEmail(input.value.trim())) {
        parent.classList.add('is--error');
        isValid = false;
      } else if (input.type === 'tel' && !isValidPhone(input.value.trim())) {
        parent.classList.add('is--error');
        isValid = false;
      }
    });
    return isValid;
  }

  function isValidEmail(email) {
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
  }

  function isValidPhone(phone) {
    var phonePattern = /^\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}$/;
    return phonePattern.test(phone);
  }

})(jQuery)