<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {
	public function graphics_design()
	{
		$cTitle = 'Graphics design';
		$cOverview = '<p>Graphic design is the art and practice of planning and projecting ideas and experiences with visual and textual content. In this case, the form of communication could be physical, image or any visual form. By following up this, Rokomari IT Institute include different topic in this course.</p>';
		$cDescription = '<ul style="margin-left:50px;">
                        	<li><i class="glyphicon glyphicon-hand-right"></i><b>	Adobe Photoshop </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b>	Adobe Illustrator </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b>	Color Studies </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b>	In design </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b>	Outsourcing </b></li>
                    	</ul>'; 
        $cFee = '18000/-';
        $tSeat = '30';
        $duration = '3 month';
	

		$data['cTitle'] = $cTitle;
		$data['cOverview'] = $cOverview;
		$data['cDescription'] = $cDescription;
		$data['cFee'] = $cFee;
		$data['tSeat'] = $tSeat;
		$data['duration'] = $duration;
		$data['image'] = "graphics-design.jpg";

		$this->load->view('include/r_header',$data);
		$this->load->view('course',$data);
		$this->load->view('include/r_footer');

	}
	public function web_design()
	{
		$cTitle = 'Web design';
		$cOverview =  '<p>Website design means planning, creation and updating of websites. A candidate will learn how to design and build beautiful websites by learning the basic principles of design like branding, color theory, and typography which are all instrumental in the design process of a website. It will cover the above topic under this course track.</p>';
		$cDescription = '<ul style="margin-left:50px;">
                        	<li><i class="glyphicon glyphicon-hand-right"></i><b>	Html </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b>	CSS </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b>	Basic PHP </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b>	PSD to HTML </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b>	Java-script </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b>	My SQL </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b>	Notepad++ </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b>	Other tools </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b>	Outsourcing  </b></li>
                    	</ul>';
        $cFee = '15000/-';
        $tSeat = '30';
        $duration = '3 month';
        $data['cTitle'] = $cTitle;
		$data['cOverview'] = $cOverview;
		$data['cDescription'] = $cDescription;
		$data['cFee'] = $cFee;
		$data['tSeat'] = $tSeat;
		$data['duration'] = $duration;
		$data['image'] = "web-design.jpg";

		$this->load->view('include/r_header',$data);
		$this->load->view('course',$data);
		$this->load->view('include/r_footer');
	}
	public function web_development()
	{
		$cTitle = 'Web development';
		$cOverview = '<p>Web development refers to the tasks associated with developing websites for hosting via intranet or Internet such as like content, client-side, server side, scripting etc. It will enable website functionality accordance to the requirement. This course track will include the following topic.</p>';
		$cDescription = '<ul style="margin-left:50px;">
                        	<li><i class="glyphicon glyphicon-hand-right"></i><b>	Html </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b>	CSS </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b>   PHP </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b>	PSD to HTML </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b>	Java-script </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b>	My SQL </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b>	Laraval </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b>	Codeigniter </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b>   Word-Press theme customization </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b>  	HTML To WprdPress </b></li>
                    	</ul>';
        $cFee = '24000/-';
        $tSeat = '30';
        $duration = '5 month';
        $data['cTitle'] = $cTitle;
		$data['cOverview'] = $cOverview;
		$data['cDescription'] = $cDescription;
		$data['cFee'] = $cFee;
		$data['tSeat'] = $tSeat;
		$data['duration'] = $duration;
		$data['image'] = "Web-Development.jpg";

		$this->load->view('include/r_header',$data);
		$this->load->view('course',$data);
		$this->load->view('include/r_footer');
	}
	public function digital_marketing()
	{
		$cTitle = 'Digital Marketing';
		$cOverview = '<p>“Digital marketing is an umbrella term for the marketing of products or services using digital technologies, mainly on the Internet, but also including mobile phones, display advertising, and any other digital medium.” – Wikipedia</p><P>We have design our training course with current practice by digital marketer. This course will cover the following topic:</p>';
		$cDescription = '<ul style="margin-left:50px;">
                        	<li><i class="glyphicon glyphicon-hand-right"></i><b> Keyword research </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Competitor analysis </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> On-page optimization </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Off-page optimization </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Introduction On Social Media Marketing </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Facebook Marketing </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Twitter Marketing </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Google Plus Marketing </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Instagram Marketing </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Youtube Marketing </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Linkedin Marketing </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Outsourcing </b></li>
                    	</ul>';
        $cFee = '18000/-';
        $tSeat = '30';
        $duration = '3 month';
        $data['cTitle'] = $cTitle;
		$data['cOverview'] = $cOverview;
		$data['cDescription'] = $cDescription;
		$data['cFee'] = $cFee;
		$data['tSeat'] = $tSeat;
		$data['duration'] = $duration;
		$data['image'] = "Digital-Marketing.jpg";

		$this->load->view('include/r_header',$data);
		$this->load->view('course',$data);
		$this->load->view('include/r_footer');
	}

	public function seo()
	{
		$cTitle = 'SEO';
		$cOverview = '<p>Search engine optimization (SEO) is often about making small modifications to parts of your website. When viewed individually, these changes might seem like incremental improvements, but when combined with other optimizations, they could have a noticeable impact on your site is user experience and performance in organic search results. You are likely already familiar with many of the topics in this guide, because they are essential ingredients for any web page, but you may not be making the most out of them. This course will cover the following topic:</p>';
		$cDescription = '<ul style="margin-left:50px;">
                        	<li><i class="glyphicon glyphicon-hand-right"></i><b> Keyword research </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Competitor analysis </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> On-page optimization </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Off-page optimization </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Introduction On Social Media Marketing </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Facebook Marketing </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Twitter Marketing </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Google Plus Marketing </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Instagram Marketing </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Youtube Marketing </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Linkedin Marketing </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Outsourcing </b></li>
                    	</ul>';
        $cFee = '18000/-';
        $tSeat = '30';
        $duration = '3 month';
        $data['cTitle'] = $cTitle;
		$data['cOverview'] = $cOverview;
		$data['cDescription'] = $cDescription;
		$data['cFee'] = $cFee;
		$data['tSeat'] = $tSeat;
		$data['duration'] = $duration;
		$data['image'] = "SEO.jpg";

		$this->load->view('include/r_header',$data);
		$this->load->view('course',$data);
		$this->load->view('include/r_footer');
	}



	public function android_app_development()
	{
		$cTitle = 'Android App development';
		$cOverview = '<p>Android app development is the process of developing application for the android system. Application usually developed by software development kit (SDK). Mostly java language are going to be used for app development.</p>';
		$cDescription = '<ul style="margin-left:50px;">
                        	<li><i class="glyphicon glyphicon-hand-right"></i><b> Working With Java Data Types </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Using Operators and Decision Constructs  </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Creating and Using Arrays </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Using Loop Constructs </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Working with Methods and Encapsulation </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Working with Inheritance </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Handling Exceptions </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Java Class Design </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Advanced Class Design </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> String Processing </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Exceptions and Assertions </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Threads </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Outsourcing </b></li>
                    	</ul>';
        $cFee = '20000/-';
        $tSeat = '30';
        $duration = '3 month';
        $data['cTitle'] = $cTitle;
		$data['cOverview'] = $cOverview;
		$data['cDescription'] = $cDescription;
		$data['cFee'] = $cFee;
		$data['tSeat'] = $tSeat;
		$data['duration'] = $duration;
		$data['image'] = "Android-App-development.jpg";

		$this->load->view('include/r_header',$data);
		$this->load->view('course',$data);
		$this->load->view('include/r_footer');
	}
	public function programming_language_c_cSharp_net()
	{
		$cTitle = 'Programming Language C, C#, .Net';
		$cOverview = '<p>A programming language is a formal computer language designed to communicate instructions to a machine, particularly a computer. Programming languages can be used to create programs to control the behavior of a machine or to express algorithms.</p>';
		$cDescription = '<ul style="margin-left:50px;">
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Programming Fundamental </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Basic Structure of Programming </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Procedure Oriented Programming (POP) </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Object Oriented Programming (OOP) </b></li>
                    	</ul>';
		$cFee = '20000/-';
        $tSeat = '30';
        $duration = '3 month';
        $data['cTitle'] = $cTitle;
		$data['cOverview'] = $cOverview;
		$data['cDescription'] = $cDescription;
		$data['cFee'] = $cFee;
		$data['tSeat'] = $tSeat;
		$data['duration'] = $duration;
		$data['image'] = "Programming-Language-C-C-NET.jpg";

		$this->load->view('include/r_header',$data);
		$this->load->view('course',$data);
		$this->load->view('include/r_footer');
	}
	public function programming_language_java()
	{
		$cTitle = 'Programming Language java';
		$cOverview = '<p>A programming language is a formal computer language designed to communicate instructions to a machine, particularly a computer. Programming languages can be used to create programs to control the behavior of a machine or to express algorithms.</p>';
		$cDescription = '<ul style="margin-left:50px;">
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Programming Fundamental </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Basic Structure of Programming </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b>Basic Object Oriented Programming (OOP) </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Data Hiding and Encapsulation </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Inheritance </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Polymorphism </b></li>
                    	</ul>';
		$cFee = '20000/-';
        $tSeat = '30';
        $duration = '3 month';
        $data['cTitle'] = $cTitle;
		$data['cOverview'] = $cOverview;
		$data['cDescription'] = $cDescription;
		$data['cFee'] = $cFee;
		$data['tSeat'] = $tSeat;
		$data['duration'] = $duration;
		$data['image'] = "Programming-Language-Java.jpg";

		$this->load->view('include/r_header',$data);
		$this->load->view('course',$data);
		$this->load->view('include/r_footer');
	}
	public function database_management()
	{
		$cTitle = 'Database Management';
		$cOverview = '<p>A database management system is a computer software application that interacts with the user, other applications, and the database itself to capture and analyze data. A general-purpose DBMS is designed to allow the definition, creation, querying, update, and administration of databases.</p>';
		$cDescription = '<ul style="margin-left:50px;">
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Database Fundamental </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Data Structuring </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Database Customization </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Data Retrieval </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Query Languages </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Database security </b></li>
                    	</ul>';
		$cFee = '18000/-';
        $tSeat = '30';
        $duration = '3 month';
        $data['cTitle'] = $cTitle;
		$data['cOverview'] = $cOverview;
		$data['cDescription'] = $cDescription;
		$data['cFee'] = $cFee;
		$data['tSeat'] = $tSeat;
		$data['duration'] = $duration;
		$data['image'] = "Database-Management.jpg";


		$this->load->view('include/r_header',$data);
		$this->load->view('course',$data);
		$this->load->view('include/r_footer');
	}
	public function web_security()
	{
		$cTitle = 'Web Security';
		$cOverview = '<p>Web application security is a branch of Information Security that deals specifically with security of websites, web applications and web services. At a high level, Web application security draws on the principles of application security but applies them specifically to Internet and Web systems.</p>';
		$cDescription = '<ul style="margin-left:50px;">
                        	<li><i class="glyphicon glyphicon-hand-right"></i><b> Introduction to Ethical Hacking </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> SQL Injection Constructs  </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Cryptography </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Malware threats </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> SSL </b></li>
                    	</ul>';
        $cFee = '12000/-';
        $tSeat = '30';
        $duration = '1 month';
        $data['cTitle'] = $cTitle;
		$data['cOverview'] = $cOverview;
		$data['cDescription'] = $cDescription;
		$data['cFee'] = $cFee;
		$data['tSeat'] = $tSeat;
		$data['duration'] = $duration;
		$data['image'] = "Web-Security.jpg";


		$this->load->view('include/r_header',$data);
		$this->load->view('course',$data);
		$this->load->view('include/r_footer');
	}
	public function ms_office_application()
	{
		$cTitle = 'MS Office Application';
		$cOverview = '<p>Office application is seems like the obvious skills for the computer user. An office application is a Software that is used in business such as word processing, database management, spreadsheet, and e-mail. Common office applications are widely available in a packaged set from vendors. Here Rokomari (RITI) offers the following topic in MS office application.</p>';
		$cDescription = '<ul style="margin-left:50px;">
                        	<li><i class="glyphicon glyphicon-hand-right"></i><b> Introduction of MS Office </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> MS. Word  </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> MS. Excel </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> MS. PowerPoint </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Ms. Outlook </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Internet  Browsing & Research </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Outsourcing </b></li>
                    	</ul>';
        $cFee = '10000/-';
        $tSeat = '30';
        $duration = '3 month';
        $data['cTitle'] = $cTitle;
		$data['cOverview'] = $cOverview;
		$data['cDescription'] = $cDescription;
		$data['cFee'] = $cFee;
		$data['tSeat'] = $tSeat;
		$data['duration'] = $duration;
		$data['image'] = "MS-Office-Application.jpg";


		$this->load->view('include/r_header',$data);
		$this->load->view('course',$data);
		$this->load->view('include/r_footer');
	}
	public function cpa_marketing()
	{
		$cTitle = 'CPA Marketing';
		$cOverview = '<p>CPA stands for “cost per action” and when someone use it for marketing purpose then it call CPA marketing. It is the process of getting paid when someone click on affiliate link and complete an action. The actions are filling out a form, signing up for free trial, getting an estimate or quote, buying something.</p>';
		$cDescription = '<ul style="margin-left:50px;">
                        	<li><i class="glyphicon glyphicon-hand-right"></i><b> SEO </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> SMM  </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Youtube Marketing </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Email Marketing </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Landing Page </b></li>
							<li><i class="glyphicon glyphicon-hand-right"></i><b> Proven method </b></li>
                    	</ul>';
        $cFee = '10000/-';
        $tSeat = '30';
        $duration = '1 month';
        $data['cTitle'] = $cTitle;
		$data['cOverview'] = $cOverview;
		$data['cDescription'] = $cDescription;
		$data['cFee'] = $cFee;
		$data['tSeat'] = $tSeat;
		$data['duration'] = $duration;
		$data['image'] = "CPA-Marketing.jpg";

		$this->load->view('include/r_header',$data);
		$this->load->view('course',$data);
		$this->load->view('include/r_footer');
	}
}
