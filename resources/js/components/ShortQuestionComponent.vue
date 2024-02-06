<template>
    <div>
      <div>
        <label for="subject">Subject:</label>
        <select v-model="subjectId" @change="getChapters">
          <option value="" disabled>Select subject</option>
          <option v-for="subject in subjects" :key="subject.id" :value="subject.id">{{ subject.name }}</option>
        </select>
      </div>
  
      <div>
        <label for="chapter">Chapter:</label>
        <select v-model="chapterId">
          <option value="" disabled>Select chapter</option>
          <option v-for="chapter in chapters" :key="chapter.id" :value="chapter.id">{{ chapter.name }}</option>
        </select>
      </div>
  
      <div>
        <div class="row">
          <div class="col">
            <textarea class="form-control" v-model="question" rows="5" placeholder="Enter question"></textarea>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col">
            <textarea class="form-control" v-model="answer" rows="5" placeholder="Enter answer"></textarea>
          </div>
        </div>
        <!-- Add image upload input if needed -->
        <button @click="submitQuestion">Submit</button>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        subjectId: '',
        chapterId: '',
        question: '',
        answer: '',
        subjects: [],
        chapters: [],
      }
    },
    mounted() {
      // Fetch subjects on component mount
      this.getSubjects();
    },
    methods: {
      getSubjects() {
        // Fetch subjects from your backend API
        // Example using axios:
        axios.get('/get_subjects')
          .then(response => {
            this.subjects = response.data;
          })
          .catch(error => {
            console.error('Error fetching subjects:', error);
          });
      },
      getChapters() {
        // Fetch chapters for the selected subject
        // Example using axios:
        axios.get(`/getChaptersById/${this.subjectId}/chapters`)
          .then(response => {
            this.chapters = response.data;
       
          })
          .catch(error => {
            console.error('Error fetching chapters:', error);
          });
      },
      submitQuestion() {
        const formData = {
          subject_id: this.subjectId,
          chapter_id: this.chapterId,
          question: this.question,
          answer: this.answer,
          // Add other form data properties as needed
        };
        
        // Assuming you're using axios for HTTP requests
        axios.post('/add_short_question', formData)
          .then(response => {
            // Handle success, maybe show a success message or clear form
           // console.log('Question submitted successfully');
           console.log(response); 
           this.question = '';
            this.answer = '';
          })
          .catch(error => {
            // Handle error, maybe show an error message
            console.error('Error submitting question:', error);
          });
      }
    }
  }
  </script>
  
  <style scoped>
  /* Add component-specific styles here if needed */
  </style>
  