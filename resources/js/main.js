import Vue from 'vue';

new Vue({
  el: '#accordion',
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
