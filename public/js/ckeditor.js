const {
	ClassicEditor,
	AutoLink,
	Autosave,
	Bold,
	Essentials,
	FontBackgroundColor,
	FontColor,
	FontFamily,
	FontSize,
	Italic,
	Link,
	Paragraph,
	Strikethrough,
	Underline
} = window.CKEDITOR;

const LICENSE_KEY =
	'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3NjcwNTI3OTksImp0aSI6Ijc3YTVhZDg3LWExY2QtNDQwMS1iMTBmLTU5YjdjYjU2OTc5ZSIsImxpY2Vuc2VkSG9zdHMiOlsiMTI3LjAuMC4xIiwibG9jYWxob3N0IiwiMTkyLjE2OC4qLioiLCIxMC4qLiouKiIsIjE3Mi4qLiouKiIsIioudGVzdCIsIioubG9jYWxob3N0IiwiKi5sb2NhbCJdLCJ1c2FnZUVuZHBvaW50IjoiaHR0cHM6Ly9wcm94eS1ldmVudC5ja2VkaXRvci5jb20iLCJkaXN0cmlidXRpb25DaGFubmVsIjpbImNsb3VkIiwiZHJ1cGFsIl0sImxpY2Vuc2VUeXBlIjoiZGV2ZWxvcG1lbnQiLCJmZWF0dXJlcyI6WyJEUlVQIl0sInZjIjoiODU4MmU3MTUifQ.N7kzTQDJSS6IX_VPuFOZRe46Q_jVqcWL28Xj73Oo1bpd1pJjLLHU-RiCJXe0-9fu8REFrdPNLQ9JKpaBEiMw5g';

const editorConfig = {
	toolbar: {
		items: ['fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|', 'bold', 'italic', 'underline', 'strikethrough', '|', 'link'],
		shouldNotGroupWhenFull: false
	},
	plugins: [
		AutoLink,
		Autosave,
		Bold,
		Essentials,
		FontBackgroundColor,
		FontColor,
		FontFamily,
		FontSize,
		Italic,
		Link,
		Paragraph,
		Strikethrough,
		Underline
	],
	fontFamily: {
		supportAllValues: true
	},
	fontSize: {
		options: [10, 12, 14, 'default', 18, 20, 22],
		supportAllValues: true
	},
	initialData:
		'',
	licenseKey: LICENSE_KEY,
	link: {
		addTargetToExternalLinks: true,
		defaultProtocol: 'https://',
		decorators: {
			toggleDownloadable: {
				mode: 'manual',
				label: 'Downloadable',
				attributes: {
					download: 'file'
				}
			}
		}
	},
	placeholder: 'Napisz swoją recenzję...'
};

ClassicEditor.create(document.querySelector('#editor'), editorConfig);
