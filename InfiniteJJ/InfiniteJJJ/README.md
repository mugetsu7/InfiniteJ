# InfiniteJ
InfiniteJukebox Transition Detection Game called InfiniteJJ
Credits and Copyright to Paul Lamere (original creator of [InfiniteJukebox])

## Problem
We want to investigate on how to judge the users on their ability to identify the occurrence of transitions of the song on Infinite Jukebox.

## Process 
InfiniteJJ would play a song and for every transition the song makes that one hears, one has 4 beats to press the plus button on the side pad of the keyboard to indicate that transition. After 4 beats, one would lose a point because one fail to detect the transition at that specific time. Moreover, if one pressed the plus button without hearing the transition in the song, one would also lose point because one falsely assume the transition when it is not there. 

## Dependencies
To use InfiniteJJ, you will need:
- Your Echonest's API_KEY for policy file
- Your own directory for uploading song and update it in upload.php
- Update the link directing to your directory in index, upload, and loader file
- The song that you want to play the Transition Detection Game with (possibly uploading your own song)

The user can use the command below to download necessary file for the InfiniteJ to run independently:
```python
wget url . 
```

## Code Explanation
There are five necessary variables listed below:
- flag: boolean variable that allows the transition to be considered only after 4 beats since the song makes its transition 
- flagN: boolean variable to indicate that user did not press the plus keyboard after 4 beats since the song makes its transition 
- actual_transition: counter that counts the occurrence of the transitions that song is currently making
- detected_transition: counter that counts the transitions that the user detects correctly
- false_positiveT: counter that counts the song's transitions that the user detects falsely
- false_negativeT: counter that counts the song's transitions that the user missed 

I made the table called DATA that have all the information for the four types of transitions below the figure including actual_transition, detected_transition, false_positiveT, and false_negativeT. I got the table format from[CodePen Table] then I incorporated that to my style.css to make the table looks more attractive and easy to see. 

This sample part of the code shows how the first row of the DATA table is constructed. The variable that I want to show would be assigned an unique key id such as <p id="demo"></p> which would be updated or assigned inside the javascript section of the code. 
```python
<center> <h1>DATA</h1> <center>
			<center> <table class="rwd-table">
				<tr>
					<th>Actual Transitions</th>
					<td data-th="Actual Transitions"><p id="demo"></p></td>
				</tr>
```
Then inside the javascript section of index.html of [InfiniteJukebox], everytime the variable I want to show gets updated, I posted them to the table with document.getElementById(variable's unique id) = Number(variable's name).toString(10) with .toString(10) indicates that we are using decimal instead of hexadecimal or binary. For instance,
```python
document.getElementById("demo").innerHTML = Number(actual_transition).toString(10);
```
[CodePen Table]: http://codepen.io/anon/share/zip/KwEJRB/
[InfiniteJukebox]: http://labs.echonest.com/Uploader/index.html

