<template>
  <div>
    <div class="support page">
      <div v-if="loading">
        <Loading />
      </div>

      <div v-if="success" class="message success">
        <ul>
          <li>message sent with success</li>
        </ul>
      </div>
      <div v-if="error">
        <div class="message error">
          <ul>
            <li
              v-for="(msg, i) in errors"
              :key="i"
              style="padding-bottom:0.5rem"
            >
              {{ msg[0] }}
            </li>
          </ul>
        </div>
      </div>
      <h2 class="title-2">Support</h2>
      <h4 class="title-3">
        Please provide your details below, our team will connect to you shortly.
      </h4>

      <form class="form">
        <label for="subject">Subject</label>
        <input
          v-model="subject"
          class="input"
          type="text"
          placeholder="Subject..."
        />

        <label for="message">Message</label>
        <textarea
          v-model="message"
          class="input"
          placeholder="Message..."
          cols="30"
          rows="8"
        ></textarea>

        <button class="cta primary" @click.prevent="sendSupportForm">
          Send
        </button>
      </form>
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
      errors: []
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
