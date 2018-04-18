<?PHP

/**
 * Main file of the scheduler package.
 * It lists all the instances of scheduler in a particular course.
 *
 * @package    mod_scheduler
 * @copyright  2011 Henning Bostelmann and others (see README.txt)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */



require_once(dirname(__FILE__) . '/../../config.php');
require_once($CFG->dirroot.'/mod/scheduler/lib.php');
require_once($CFG->dirroot.'/mod/scheduler/locallib.php');
require_once($CFG->dirroot.'/mod/scheduler/renderable.php');
defined('MOODLE_INTERNAL') || die();
require_login();
echo $OUTPUT->header();



print "<h1>Scheduler User Help</h1>";
print  "The Scheduler module helps you to schedule one-on-one appointments with all your students. You specify the periods during which you are available to see the students and the length of each appointment. The students then book themselves into one of the available timeslots. The module also lets you record the attendance and grade the appointment.";
echo ("<br>");
print "<h3>1. Quick start for the Moodle Scheduler</h3>";
print "This section shows you how to quickly make your first Moodle scheduler, so only the basics are described. Like any other first attempt, your first Moodle scheduler will probably be more for learning than using, but after you finished it, you'll be able to choose which features you want to learn more about.";
echo ("<br>");
print "<h4> 1.1. Prerequisites</h4>";
print "<ul>
<li>You must have teacher access to a Moodle course.</li>
<li>Teachers and students must be enrolled in the course.</li>
<li>The Moodle scheduler must be installed, since it is not part of the core Moodle package.</li>
</ul> ";

print "<h4> 1.2. Creating a basic scheduler</h4>";
print "
<ol>
<li>Click the -Turn editing on button-.</li>
<li>Click the link -Add an activity or resource.-</li>
<li>In the box that appears, choose -Scheduler- and click the -Add- button.</li>
<li>A web page will appear called -Adding a new Scheduler.- Type in the name of the scheduler, which can be changed later.</li>
<li>Scroll to the bottom of the webpage and click the -Save and display- button.</li>
<li>A webpage will appear with the name of your scheduler at the top. Click the -Add slots- link.</li>

<li>A drop-down menu will appear that allows you to add repeated slots or a single slot. Click the link to add repeated slots.</li>
<li>Options will appear to add time slots. For this lesson, the slots you add can be real or fictitious, for practice. All time slots must occur in the future, and the start time must be before the end time. The simplest option is to:

<ol>
<li> Click the -Start time- menu and choose a time that is one hour from now.</li>
<li> Click the -End time- menu and choose a time that is one hour after the start time.</li>
</ol>

<li>Scroll to the bottom of the webpage and click Save changes.</li>

</ol>
";

print "<h3>2. Overview of Scheduler screens</h3>";
print "
<ul>
<li>Teacher screens
<ul>
<li>My appointments</li>
<li>All Appointments</li>
<li>Adding a slot or a series of slots</li>
<li>Scheduling a student or a group of students</li>
<li>Adding a student to the slot when scheduling</li>
<li>Overview</li>
<li>Statistics</li>
<li>Exports</li>
<li>View student
<ul>
<li>View of comments</li>
<li>View of appointments and grades</li>
</ul>
</li>
</ul>
</li>

<li>Student screens
  <ul>
  <li>Viewing and booking slots </li>
  </ul>
</li>
</ul>
";

print "<h3>3. Features</h3>";
print "<h4>3.1. settings and parameters</h4> 
</br> The Scheduler module lets you configure per instance a small amount of important parameters. These parameters might change the overall behaviour of the appointment system. 
<br>
";
    print "
<h4>3.1.1 Scheduler Name And Description</h4>
<br>
As usual the name and the description are used as short reference (resp. description) in the course or the scheduler index.
<h4>Role Name Of The Attendant</h4>
The scheduler might be used not only in a strict pedagogic relationship (student->teacher). Some institutions might not even use the word of teacher for the attendant. Here could you change the label used when the attendant's quality is mentioned to the students.
";
    print "<h4>3.1.2 Mode</h4>
<br>
This parameter allows switching between the". "one only"." and the "."one at a time"." mode.
<ul>
<li>
One only: The student will be allowed to appoint only one time in this scheduler. He will not be allowed to appoint a new slot, event if his previous appointment has been concluded and marked as -seen-.
</li>
<li>
One at a time: The student will be allowed to appoint as soon as his current appointment has been marked as seen. This allows multiple encounters between student and teacher in the scope of this scheduler purpose.
</li>
</ul>
";
    print "<h4>3.1.3 Guard Time</h4>
<br>
This parameter sets a -guard time- from the time that an appointment takes place; within the -guard time-, students cannot modify their booking. That is, if the -guard time- is set to 1 hour, then students must book slots at least 1 hour in advance, and they won't be able to cancel their booking less than 1 hour before the appointment.
";
    print "<h4>3.1.4 Default Slot Duration</h4>
<br> 
Specifies the default duration of a slot (in minutes) when adding slots. This value can be overridden when adding slots.
";
    print "<h4>3.1.5 Scale</h4>
<br>
Specifies the grading scales that might be used to grade the student's interview.
";
    print "<h4>3.1.6 Grading Strategy</h4>
<br>
When mode is -one at a time-, a single student might accumulate more than one -seen- appointment. There are two way of calculating the given grade for the appointments:
<br>
<ul>
<li>
Take the mean grade: The grade will be the mean of all given grades for that student in the scheduler.
</li>
<li>
Take the highest grade: The highest grade over all the appointments will be retained for grading.
</li>
</ul>
";
print "<h4>3.2 Scheduling modes</h4>
<br>
The Scheduler module allows two behaviours relative to appointing, depending on configuration settings. When set to -one only-, a student can propose a unique appointment. When set to -one at a time-, the student may propose one appointment, and will have to wait to be seen, before being able to make a subsequent appointment.
";
print "<h4>3.3 Slots exclusivity </h4>
<br>
A slot may accept an unlimited number of students (say, when scheduling for open meetings), or only one (face-to-face meeting), or may be set to accept a predefined number of students.
";

print "<h4>3.4 Messages and notifications </h4>
<br>
An optional notification service sends messages to teachers and students on certain changes:
    <ul>
    <li>To teachers, when a student books or cancels an appointment,</li>
    <li>To students, when a teacher declines an appointment. (Note, no message is sent when the teacher deletes the slot instead.)</li>
    </ul>
<br>
This can be enabled or disabled on each Scheduler's settings page.
<br>
Scheduler also sends reminders of upcoming appointments to students, if the teacher has selected this on a per-slot basis.
<br>
Further, teachers can use a web form for manually sending invitations or reminders to students who did not yet make an appointment.
";
print "<h4>3.5 Behaviour with groups </h4>
<br>
Scheduler has two different group-related features, both of which can be enabled independently on a per-scheduler basis:
    <ul>
    <li>Restriction to groups: Students can schedule appointments only with teachers in their group,</li>
    <li>Booking in groups: Students can schedule an appointment for the entire group at once.</li>
    </ul>
<br>
<b>Restriction to groups </b> is controlled by Moodle's usual Group mode feature (in -Common settings-). Setting -Group mode- to -Visible groups- or -Separate groups- will mean that students can see, and book, only slots which are offered by a teacher with whom they are in a common group. Additionally, in -Separate groups- mode, teachers won't be able to see slots outside their group unless they have permission to access all groups.
<br>
<b>Booking in groups</b>means that each student of the group can make an appointment for the entire group, i.e., when they click the -Book slot- button, they have the option to assign the entire group to that slot. In order for a student to schedule a group, they will have to belong to at least one group in the course. In the special case where the student belongs to several groups and they wish to make an appointment within a group, they will not be able to make the appointment until the student has been seen (one-at-a-time setting) or at all (only-one-time setting). With -Booking in groups- enabled, teachers will also be able to assign an entire group to a slot at once.
<br>
Note that irrespective of the group features, slots always remain assigned to one teacher and zero or more individual students, and are not as such tied to a group.
";
print "<h4>3.6. Scheduling conflicts</h4>
<br>
Scheduler will, in some situations, warn the user if they are creating scheduling conflicts, i.e., two appointments for the same person at the same time.

";
print "<h4>3.7.Booking forms and student-supplied data</h4>
Optionally, students can be presented with a booking form in which they can enter a message for the teacher or upload files. They can also be required to solve a CAPTCHA to prevent automated bookings.

";
print "<h3>4. Moodle standard interfaces</h3>";
print "<h4>4.1. Capabilities</h4>
<br>
For an overview of the permission system in Scheduler, see Scheduler Module capabilities.
";
print "<h4>4.2. Backup/Restore</h4>
<br>
The module performs complete backup/restore within the course context. Both slots and appointments are considered as -user related data-. Therefore, backup/restore without user data (for example, when clicking the -duplicate- button) will copy only the configuration settings, but not slots or appointments.
";
print "<h3>Links</h3>
<ul>
<li>
<a href="."https://moodle.org/mod/forum/view.php?id=7139".">Scheduler module forum</a>
</li>
<li>
<a href="."https://moodle.org/plugins/view.php?plugin=mod_scheduler".">Plug-in database entry for Scheduler module</a>
</li>
</ul>
";

echo $OUTPUT->footer();
?>
