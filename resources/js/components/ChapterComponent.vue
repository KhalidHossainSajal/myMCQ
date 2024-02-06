<template>
    <div>
      <h2>Add Chapter</h2>
      <form @submit.prevent="submitForm">
        <div>
          <label for="name">Chapter Name:</label>
          <input type="text" v-model="chapter.name" required />
        </div>
        <div>
          <label for="description">Chapter Description:</label>
          <textarea v-model="chapter.description"></textarea>
        </div>
        <div>
          <label for="subject">Select Subject:</label>
          <select v-model="chapter.subject_id" required>
            <option v-for="subject in subjects" :key="subject.id" :value="subject.id">
              {{ subject.name }}
            </option>
          </select>
        </div>
       
        <button type="submit">Add Chapter</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        chapter: {
          name: '',
          description: '',
          subject_id: null,
        },
        subjects: [], // Array to store subjects fetched from the backend
      };
    },
    mounted() {
      // Fetch subjects from your backend API and populate the subjects array
      this.fetchSubjects();
    },
    methods: {
      fetchSubjects() {
        // Make an API call to get the list of subjects
        // For example, using axios:
         axios.get('/get_subjects')
           .then(response => {
            this.subjects = response.data;
           })
          .catch(error => {
           console.error('Error fetching subjects:', error);
           });
  
        // Mock data for example
        // this.subjects = [
        //   { id: 1, name: 'Math' },
        //   { id: 2, name: 'Science' },
        //   // Add more subjects as needed
        // ];
      },
      submitForm() {
        // Make an API call to insert data into the "chapters" table
        // For example, using axios:
        axios.post('/add_chapter', this.chapter)
          .then(response => {
            console.log('Chapter added successfully:', response.data);
            // Reset the form or perform any other necessary actions
            this.chapter = { name: '', description: '', subject_id: null, active: false };
          })
          .catch(error => {
            console.error('Error adding chapter:', error);
          });
  
        // Mock data for example
       // console.log('Chapter added successfully:', this.chapter);
        // Reset the form or perform any other necessary actions
        this.chapter = { name: '', description: '', subject_id: null, active: false };
      },
    },
  };
  </script>
  
  <style scoped>
  /* Add your component styles here */
  </style>
  