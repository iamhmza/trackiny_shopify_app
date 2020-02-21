import Vue from 'vue';

new Vue({
  el: '#faq',
  delimiters: ['#{', '}'],
  data: {
    quests: [
      {
        id: 1,
        question: 'can i try for free',
        answer:
          'Sure, you can! When you install Trackiny, you will have a 14 days free trial where you can test the capabilities/functions of the app. If for any reason you think that the app is not for you, you can simply uninstall it from your store during your trial and you will never be charged.',
        open: false
      },
      {
        id: 2,
        question: 'Can i use Trackiny with other ecommerce platforms',
        answer: 'yes of course you could',
        open: true
      },
      {
        id: 3,
        question: 'Why trackiny and not submitting the info manualy',
        answer: 'yes of course you could',
        open: false
      },
      {
        id: 4,
        question: 'can i connect multiple stores with the same subscription',
        answer: 'yes of course you could',
        open: false
      },
      {
        id: 5,
        question: 'is trackiny safe to use ?',
        answer: 'yes of course you could',
        open: false
      },
      {
        id: 6,
        question: 'I have another question',
        answer: 'yes of course you could',
        open: false
      }
    ]
  },
  methods: {
    toggleClass(id) {
      this.quests = this.quests.map(quest => {
        if (quest.id == id) {
          return { ...quest, open: !quest.open };
        } else {
          return { ...quest, open: false };
        }
      });
    }
  }
});

new Glider(document.querySelector('.glider'), {
  slidesToShow: 1, //'auto',
  slidesToScroll: 1,
  itemWidth: 150,
  draggable: true,
  scrollLock: false,
  dots: '.dots',
  // rewind: true,
  responsive: [
    {
      // screens greater than >= 775px
      breakpoint: 768,
      settings: {
        // Set to `auto` and provide item width to adjust to viewport
        slidesToShow: 2,
        slidesToScroll: 1.5,
        itemWidth: 150,
        duration: 0.25
      }
    },
    {
      // screens greater than >= 1024px
      breakpoint: 1024,
      settings: {
        slidesToShow: 2.5,
        slidesToScroll: 1.5,
        itemWidth: 150,
        duration: 0.25
      }
    }
  ]
});
