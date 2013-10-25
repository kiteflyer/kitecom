doctype = html_5
### TYPO3 >= 4.7
[compatVersion => 4.7]
	doctype = html5
[global]


styles.content.imgtext.maxWInText = 0
styles.content.imgtext.linkWrap.width = 800
styles.content.imgtext.linkWrap.lightboxEnabled = 1
styles.content.loginform.pid = 0
styles.content.imgtext.linkWrap.lightboxCssClass = colorbox
styles.content.imgtext.linkWrap.lightboxRelAttribute = group[{field:uid}]





plugin.tx_srfeuserregister_pi1 {
	dateFormat = d.m.Y
	dateSplit = .
	enableAutoLoginOnConfirmation = 1
	#useEmailAsUsername = 1
	enablePreviewRegister = 0
	siteName = Kitecom.net
	email = rm@t3-design.ch
	#formFields = username, password, gender, first_name, last_name, date_of_birth, email, usergroup, terms_acknowledged 
	formFields = username, password, gender, email, usergroup	
	confirmPID = 0
	editPID = 0
	registerPID = 13
	confirmInvitationPID = 0
	linkToPID = 0
	loginPID = 12
	pid = 11
	userGroupUponRegistration = 1
	userGroupAfterConfirmation = 1
	userGroupAfterAcceptation = 0
	userGroupsPidList = 11
	allowUserGroupSelection = 1
	allowedUserGroups = 3,4,5
}


VAR.type = register
[PIDinRootline = 14]
VAR.type = edit
[global]