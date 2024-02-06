<template>
  <div class="multiple-choice-question">
    <textarea v-model="questionText" placeholder="Enter the question"></textarea>
    
    <div v-for="(option, index) in options" :key="index">
      <input type="text" v-model="options[index]" :placeholder="'Option ' + (index + 1)">
    </div>
    
    <div>
      <label v-for="(option, index) in options" :key="index">
        <input type="checkbox" v-model="correctAnswers" :value="index">
        {{ option }}
      </label>
    </div>
    
    <div>
      <label for="subject">Subject:</label>
      <select v-model="subjectId" id="subject">
        <option v-for="subject in subjects" :key="subject.id" :value="subject.id">{{ subject.name }}</option>
      </select>
    </div>
    
    <div>
      <label for="chapter">Chapter:</label>
      <select v-model="chapterId" id="chapter">
        <option v-for="chapter in chapters" :key="chapter.id" :value="chapter.id">{{ chapter.name }}</option>
      </select>
    </div>
    
    <button @click="saveQuestion">Save Question</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      questionText: '',
      options: ['', '', '', ''],
      correctAnswers: [],
      subjectId: null,
      chapterId: null,
      subjects: [],
      chapters: []
    };
  },
  created() {
    // Fetch subjects and chapters when component is created
    this.fetchSubjects();
    this.fetchChapters();
  },
  methods: {
    fetchSubjects() {
      // Make an HTTP request to fetch subjects
      axios.get('/get_subjects')
        .then(response => {
          this.subjects = response.data;
        })
        .catch(error => {
          console.error('Error fetching subjects:', error);
        });
    },
    fetchChapters() {
      // Make an HTTP request to fetch chapters
      axios.get('/get_chapters')
        .then(response => {
          this.chapters = response.data;
        })
        .catch(error => {
          console.error('Error fetching chapters:', error);
        });
    },
    saveQuestion() {
      const questionData = {
        question_text: this.questionText,
        option1: this.options[0],
        option2: this.options[1],
        option3: this.options[2],
        option4: this.options[3],
        correct_answers: this.correctAnswers,
        subject_id: this.subjectId,
        chapter_id: this.chapterId
      };

      axios.post('/add_mcq', questionData)
        .then(response => {
          console.log(response.data); 
          this.questionText = '';
          this.options = ['', '', '', ''];
          this.correctAnswers = [];
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }
  }
};
</script>

<style scoped>
/* CSS styles remain unchanged */
</style>