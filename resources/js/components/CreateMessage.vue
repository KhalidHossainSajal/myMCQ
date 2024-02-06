<template>
    <div class="contact-message-form">
      <form @submit.prevent="submitMessage">
      
        <div>
          <label for="subject">Subject:</label>
          <input type="text" v-model="subject" id="subject" >
        </div>
        <div>
          <label for="message">Message:</label>
          <textarea v-model="message" id="message"></textarea>
        </div>
        <div>
          <label for="mobile_no">Mobile No:</label>
          <input type="text" v-model="mobile_no" id="mobile_no">
        </div>
        <button type="submit">Submit</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    props: ['userId'],
    data() {
      return {
        user_id: null,
        subject: '',
        message: '',
        mobile_no: '',
        email: "{{ $email }}", // Bind $email variable
        id: "{{ $id }}"
      };
    },
    methods: {
      submitMessage() {
        const messageData = {
          user_id: this.user_id,
          subject: this.subject,
          message: this.message,
          mobile_no: this.mobile_no
        };
  
        // Make HTTP POST request to Laravel backend
        axios.post('/add_msg', messageData)
          .then(response => {
            console.log(response.data); // Log response from server
            // Reset form fields after successful submission
            this.user_id = null;
            this.subject = '';
            this.message = '';
            this.mobile_no = '';
          })
          .catch(error => {
            console.error('Error:', error);
          });
      }
    }
  };
  </script>
  
  <style scoped>
  /* CSS styles */
  </style>
  