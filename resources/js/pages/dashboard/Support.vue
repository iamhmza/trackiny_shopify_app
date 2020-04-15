<template>
  <div>
    <div class="support page">
      <div v-if="loading">
        <div class="loading"></div>
      </div>

      <div v-if="success" class="message success">
        <ul>
          <li>message sent with success</li>
        </ul>
      </div>

      <div v-if="!loading">
        <h2 class="title-2">Support</h2>
        <h4 class="title-3">Please provide your details below, our team will connect to you shortly.</h4>

        <form class="form">
          <div class="input-container" :data-state="state">
            <label for="subject">Subject</label>
            <input v-model="subject" id="subject" type="text" placeholder="Subject..." />
            <span v-if="errors['subject']" class="feedback-text">{{ errors['subject'][0] }}</span>
          </div>

          <div class="input-container" :data-state="state">
            <label for="message">Message</label>
            <textarea v-model="message" id="subject" placeholder="Message..." cols="30" rows="8"></textarea>
            <span v-if="errors['message']" class="feedback-text">{{ errors['subject'][0] }}</span>
          </div>

          <button class="cta primary" @click.prevent="sendSupportForm">Send</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex';
import Loading from '../../components/Loading';
import AlertBox from '../../components/AlertBox';

export default {
  components: {
    Loading,
    AlertBox
  },
  data() {
    return {
      subject: '',
      message: '',
      state: 'idle',
      errors: {}
    };
  },
  computed: {
    ...mapGetters(['getEmail']),
    loading() {
      return this.state === 'loading';
    },
    success() {
      return this.state === 'success';
    },
    error() {
      return this.state === 'error';
    },
    isOnErrors() {
      if (this.errors && this.errors['subject']) {
        return this.errors['subject'];
      }
      return false;
    }
  },
  methods: {
    sendSupportForm() {
      this.state = 'loading';
      axios
        .post('/me/support', {
          email: this.getEmail,
          subject: this.subject,
          message: this.message
        })
        .then(res => {
          this.state = 'success';
          this.subject = '';
          this.message = '';
        })
        .catch(err => {
          console.log(JSON.stringify(err.response.data.errors));
          this.errors = err.response.data.errors;
          this.state = 'error';
        });
    }
  }
};
</script>
