var FiltersEnabled = 0; // if your not going to use transitions or filters in any of the tips set this to 0
var spacer="&nbsp; &nbsp; &nbsp; ";

// email notifications to admin
notifyAdminNewMembers0Tip=["", spacer+"No email notifications to admin."];
notifyAdminNewMembers1Tip=["", spacer+"Notify admin only when a new member is waiting for approval."];
notifyAdminNewMembers2Tip=["", spacer+"Notify admin for all new sign-ups."];

// visitorSignup
visitorSignup0Tip=["", spacer+"If this option is selected, visitors will not be able to join this group unless the admin manually moves them to this group from the admin area."];
visitorSignup1Tip=["", spacer+"If this option is selected, visitors can join this group but will not be able to sign in unless the admin approves them from the admin area."];
visitorSignup2Tip=["", spacer+"If this option is selected, visitors can join this group and will be able to sign in instantly with no need for admin approval."];

// question_types table
question_types_addTip=["",spacer+"This option allows all members of the group to add records to the 'Question Types' table. A member who adds a record to the table becomes the 'owner' of that record."];

question_types_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Question Types' table."];
question_types_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Question Types' table."];
question_types_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Question Types' table."];
question_types_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Question Types' table."];

question_types_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Question Types' table."];
question_types_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Question Types' table."];
question_types_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Question Types' table."];
question_types_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Question Types' table, regardless of their owner."];

question_types_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Question Types' table."];
question_types_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Question Types' table."];
question_types_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Question Types' table."];
question_types_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Question Types' table."];

// questions table
questions_addTip=["",spacer+"This option allows all members of the group to add records to the 'Questions' table. A member who adds a record to the table becomes the 'owner' of that record."];

questions_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Questions' table."];
questions_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Questions' table."];
questions_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Questions' table."];
questions_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Questions' table."];

questions_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Questions' table."];
questions_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Questions' table."];
questions_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Questions' table."];
questions_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Questions' table, regardless of their owner."];

questions_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Questions' table."];
questions_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Questions' table."];
questions_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Questions' table."];
questions_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Questions' table."];

// sessions table
sessions_addTip=["",spacer+"This option allows all members of the group to add records to the 'Sessions' table. A member who adds a record to the table becomes the 'owner' of that record."];

sessions_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Sessions' table."];
sessions_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Sessions' table."];
sessions_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Sessions' table."];
sessions_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Sessions' table."];

sessions_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Sessions' table."];
sessions_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Sessions' table."];
sessions_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Sessions' table."];
sessions_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Sessions' table, regardless of their owner."];

sessions_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Sessions' table."];
sessions_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Sessions' table."];
sessions_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Sessions' table."];
sessions_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Sessions' table."];

// speakers table
speakers_addTip=["",spacer+"This option allows all members of the group to add records to the 'Speakers' table. A member who adds a record to the table becomes the 'owner' of that record."];

speakers_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Speakers' table."];
speakers_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Speakers' table."];
speakers_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Speakers' table."];
speakers_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Speakers' table."];

speakers_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Speakers' table."];
speakers_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Speakers' table."];
speakers_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Speakers' table."];
speakers_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Speakers' table, regardless of their owner."];

speakers_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Speakers' table."];
speakers_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Speakers' table."];
speakers_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Speakers' table."];
speakers_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Speakers' table."];

// session_questions table
session_questions_addTip=["",spacer+"This option allows all members of the group to add records to the 'Session Questions' table. A member who adds a record to the table becomes the 'owner' of that record."];

session_questions_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Session Questions' table."];
session_questions_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Session Questions' table."];
session_questions_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Session Questions' table."];
session_questions_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Session Questions' table."];

session_questions_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Session Questions' table."];
session_questions_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Session Questions' table."];
session_questions_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Session Questions' table."];
session_questions_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Session Questions' table, regardless of their owner."];

session_questions_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Session Questions' table."];
session_questions_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Session Questions' table."];
session_questions_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Session Questions' table."];
session_questions_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Session Questions' table."];

// responses table
responses_addTip=["",spacer+"This option allows all members of the group to add records to the 'Responses' table. A member who adds a record to the table becomes the 'owner' of that record."];

responses_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Responses' table."];
responses_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Responses' table."];
responses_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Responses' table."];
responses_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Responses' table."];

responses_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Responses' table."];
responses_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Responses' table."];
responses_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Responses' table."];
responses_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Responses' table, regardless of their owner."];

responses_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Responses' table."];
responses_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Responses' table."];
responses_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Responses' table."];
responses_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Responses' table."];

// respondents table
respondents_addTip=["",spacer+"This option allows all members of the group to add records to the 'Respondents' table. A member who adds a record to the table becomes the 'owner' of that record."];

respondents_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Respondents' table."];
respondents_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Respondents' table."];
respondents_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Respondents' table."];
respondents_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Respondents' table."];

respondents_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Respondents' table."];
respondents_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Respondents' table."];
respondents_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Respondents' table."];
respondents_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Respondents' table, regardless of their owner."];

respondents_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Respondents' table."];
respondents_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Respondents' table."];
respondents_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Respondents' table."];
respondents_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Respondents' table."];

/*
	Style syntax:
	-------------
	[TitleColor,TextColor,TitleBgColor,TextBgColor,TitleBgImag,TextBgImag,TitleTextAlign,
	TextTextAlign,TitleFontFace,TextFontFace, TipPosition, StickyStyle, TitleFontSize,
	TextFontSize, Width, Height, BorderSize, PadTextArea, CoordinateX , CoordinateY,
	TransitionNumber, TransitionDuration, TransparencyLevel ,ShadowType, ShadowColor]

*/

toolTipStyle=["white","#00008B","#000099","#E6E6FA","","images/helpBg.gif","","","","\"Trebuchet MS\", sans-serif","","","","3",400,"",1,2,10,10,51,1,0,"",""];

applyCssFilter();
