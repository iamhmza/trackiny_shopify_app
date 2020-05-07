<template>
  <div class="tuts page">
    <h2 class="title-2">Tutorials</h2>

    <div class="tuts_wrapper">
      <ul class="list">
        <li
          v-for="(video, i) in videos"
          :key="i"
          :class="video.current ? 'current' : ''"
          @click="setCurrentVideo(i)"
        >
          <div class="thumbnail">
            <img :src=" `https://img.youtube.com/vi/${video.id}/default.jpg`" :alt="video.title" />
          </div>

          <div class="info">
            <h3>{{video.title}}</h3>
            <p>{{video.desc}}</p>
          </div>
        </li>
      </ul>

      <div class="video-container">
        <h4 class="text">There is a powerful video, our team are prepared for you a awesome video.</h4>
        <div class="video">
          <iframe
            width="100%"
            height="100%"
            :src="`https://www.youtube.com/embed/${currentID}`"
            frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe>
        </div>

        <button class="cta primary">Next video</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'tuts',
  data() {
    return {
      videos: [
        {
          current: true,
          id: '6qfE-lwRLuY',
          title: 'get paypal cridentials',
          desc:
            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, laboriosam.'
        },
        {
          current: false,
          id: 'vy39yigro_8',
          title: 'get paypal cridentials',
          desc:
            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, laboriosam.'
        },
        {
          current: false,
          id: '6qfE-lwRLuY',
          title: 'get paypal cridentials',
          desc:
            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, laboriosam.'
        },
        {
          current: false,
          id: '6qfE-lwRLuY',
          title: 'get paypal cridentials',
          desc:
            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, laboriosam.'
        },
        {
          current: false,
          id: '6qfE-lwRLuY',
          title: 'get paypal cridentials',
          desc:
            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, laboriosam.'
        }
      ]
    };
  },
  computed: {
    currentID() {
      return this.videos.find(v => v.current).id;
    }
  },
  methods: {
    setCurrentVideo(i) {
      // toggle all to false
      let vids = this.videos.map(v => ({ ...v, current: false }));
      //set clicked element to current
      vids[i].current = true;

      this.videos = vids;
    },

    nextVideo(Index) {
      // edges
      // if (Index > this.videos.length) {
      // }
    }
  }
};
</script>

