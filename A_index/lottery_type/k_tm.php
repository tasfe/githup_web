﻿

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	

<?php

// var_dump($_GET);
if(!defined('PHPYOU')) {
	exit('非法进入');
}
$_GET['leixing']='特码';
$_GET['leixing_bet']='特码';
//echo "select * from ka_mem where  kauser='".$_SESSION['username']."' order by id desc";exit;
//获取对应生肖的号码
function Get_sx2_Color($rrr){  
global $mysqlt; 
$result=$mysqlt->query("Select id,m_number,sx From ka_sxnumber where  sx='".$rrr."'  and id<=12  Order By ID LIMIT 1"); 
$ka1_Color1=$result->fetch_array();
return $ka1_Color1['m_number'];
}

$ids;
if ($_GET['ids']!=""){$ids=$_GET['ids'];}else{$ids="特A";}


if ($ids=="特A"){
$xc=0;
$z2color="000000";
$z1color="FF6600";
}else{
$xc=1;
$z1color="000000";
$z2color="FF6600";
}

$XF=11;

function ka_kk1($i){   
	global $mysqlt;
	global $Current_Kithe_Num;
	global $ids;
	$sql="select sum(sum_m) as sum_mm from ka_tan where kithe='".$Current_Kithe_Num."' and  username='".$_SESSION['kauser']."' and class1='特码' and class2='".$ids."' and class3='".$i."' order by id desc";
	// echo $sql;
   	$result=$mysqlt->query($sql); 
	$ka_guanuserkk1=$result->fetch_array();

	return $ka_guanuserkk1[0];

   }


?>
<link href="imgs/main_n1.css" rel="stylesheet" type="text/css">
<link href="imgs/ball1.css" rel="stylesheet" type="text/css">
<SCRIPT type="text/javascript" src="imgs/activeX_Embed.js"></SCRIPT>

<SCRIPT language=JAVASCRIPT>
if(self == top) {location = '/';} 
if(window.location.host!=top.location.host){top.location=window.location;} 



</SCRIPT>
<SCRIPT>
var uchinayear = 12;
var timestap = 7786;

function quick0()
{
var mm = document.all.money.value;
var suz=0;
if (mm > 0) {
if ((eval(mm) < <?=ka_memuser("xy")?>) ) {alert("下注金额不可小於最低限度!!"); return false;}

}

for (var i=1; i<49; i++) {
if (document.all["Num_"+i].value == "*") {

suz=suz+1

}
}


suz=suz*mm

if (eval(suz) > <?=ka_memuser("ts")?>)   {  alert("下注金额不可大於信用额度!!");    return false;}



if ((eval(mm) > <?=ka_memds($xc,2)?>)) {alert("下注金额已超过单注限额：<?=ka_memds($xc,2)?>!!"); return false;}

for (var i=1; i<50; i++) {
if (document.all["Num_"+i].value == "*") {
if (((eval(document.all["gb"+i].value)+eval(mm)) > <?=ka_memds($xc,3)?>)) { alert("对不起,["+i+"号]本期下注金额最高限制 : <?=ka_memds($xc,3)?>!!"); return false;}
}
}


for (var i=1; i<50; i++) {
if (document.all["Num_"+i].value == "*") {
document.all["Num_"+i].value = mm;
}
}


var suzx=0;
for (var i=1; i<57; i++) {
if (document.all["Num_"+i].value == ""){}else{
suzx=suzx+eval(document.all["Num_"+i].value)
}




}
document.all.allgold.innerHTML = eval(suzx);

total_gold.value = document.all.allgold.innerHTML;


document.all.money.value = "";



}


function quick10(nn)
{
for (var i=0; i<5; i++) {
for (var j=0; j<10; j++) {
if (document.all["Num_"+(i*10+j)]) {
//				document.all["Num_"+(i*10+j)].value = "";
if (i == nn) {
if (document.all["xhao_"+(i*10+j)].value != "1"){
document.all["Num_"+(i*10+j)].value = "*";
}
}
}
}
}
}
function quick11()
{
for (var i=1; i<50; i++) {
//		document.all["Num_"+i].value = "";
switch (i) {
case 10:
case 20:
case 30:
case 40:
if (document.all["xhao_"+i].value != "1"){
document.all["Num_"+i].value = "*"; }
break;
}
}
}
function quick12(nn)
{
if (nn != ""){
for (var i=0; i<5; i++) {
for (var j=0; j<10; j++) {
if (document.all["Num_"+(i*10+j)]) {
//					document.all["num"+(i*10+j)].value = "";
if (j == nn) {
if (document.all["xhao_"+(i*10+j)].value != "1"){
document.all["Num_"+(i*10+j)].value = "*";
}
}
}
}
}
}
}

function quick15(nn)  // 生肖
{
switch (nn) {
case 1:
for (var i=1; i<50; i++) {
switch (i) {

<? $vmvm=Get_sx2_Color("鼠");


$spsx=explode(",",$vmvm);	
$ssc=count($spsx);
for ($xx=0; $xx<$ssc; $xx=$xx+1){?>
case <?=$spsx[$xx]?>:
<? } ?>
if (document.all["xhao_"+i].value != "1"){
document.all["Num_"+i].value = "*"; }

break;  // 鼠
}
}
break;
case 2:
for (var i=1; i<50; i++) {
switch (i) {
<? $vmvm=Get_sx2_Color("牛");


$spsx=explode(",",$vmvm);	
$ssc=count($spsx);
for ($xx=0; $xx<$ssc; $xx=$xx+1){?>
case <?=$spsx[$xx]?>:
<? } ?>
if (document.all["xhao_"+i].value != "1"){
document.all["Num_"+i].value = "*"; 
}

break;  // 牛
}
}
break;
case 3:
for (var i=1; i<50; i++) {
switch (i) {
<? $vmvm=Get_sx2_Color("虎");


$spsx=explode(",",$vmvm);	
$ssc=count($spsx);
for ($xx=0; $xx<$ssc; $xx=$xx+1){?>
case <?=$spsx[$xx]?>:
<? } ?>
if (document.all["xhao_"+i].value != "1"){
document.all["Num_"+i].value = "*";
}
 break;  // 虎
}
}
break;
case 4:
for (var i=1; i<50; i++) {
switch (i) {
<? $vmvm=Get_sx2_Color("兔");


$spsx=explode(",",$vmvm);	
$ssc=count($spsx);
for ($xx=0; $xx<$ssc; $xx=$xx+1){?>
case <?=$spsx[$xx]?>:
<? } ?>
if (document.all["xhao_"+i].value != "1"){
document.all["Num_"+i].value = "*"; 
}

break;  // 兔
}
}
break;
case 5:
for (var i=1; i<50; i++) {
switch (i) {
<? $vmvm=Get_sx2_Color("龙");


$spsx=explode(",",$vmvm);	
$ssc=count($spsx);
for ($xx=0; $xx<$ssc; $xx=$xx+1){?>
case <?=$spsx[$xx]?>:
<? } ?>
if (document.all["xhao_"+i].value != "1"){
document.all["Num_"+i].value = "*"; 
}
break;  // 龍
}
}
break;
case 6:
for (var i=1; i<50; i++) {
switch (i) {
<? $vmvm=Get_sx2_Color("蛇");


$spsx=explode(",",$vmvm);	
$ssc=count($spsx);
for ($xx=0; $xx<$ssc; $xx=$xx+1){?>
case <?=$spsx[$xx]?>:
<? } ?>
	if (document.all["xhao_"+i].value != "1"){
	document.all["Num_"+i].value = "*";}

	break;  // 蛇
	}
}
break;
case 7:
for (var i=1; i<50; i++) {
switch (i) {
<? $vmvm=Get_sx2_Color("马");


$spsx=explode(",",$vmvm);	
$ssc=count($spsx);
for ($xx=0; $xx<$ssc; $xx=$xx+1){?>
case <?=$spsx[$xx]?>:
<? } ?>
if (document.all["xhao_"+i].value != "1"){
document.all["Num_"+i].value = "*"; }
break;  // 馬
}
}
break;
case 8:
for (var i=1; i<50; i++) {
switch (i) {
<? $vmvm=Get_sx2_Color("羊");


$spsx=explode(",",$vmvm);	
$ssc=count($spsx);
for ($xx=0; $xx<$ssc; $xx=$xx+1){?>
case <?=$spsx[$xx]?>:
<? } ?>
if (document.all["xhao_"+i].value != "1"){
document.all["Num_"+i].value = "*"; }
break;  // 羊
}
}
break;
case 9:
for (var i=1; i<50; i++) {
switch (i) {
<? $vmvm=Get_sx2_Color("猴");


$spsx=explode(",",$vmvm);	
$ssc=count($spsx);
for ($xx=0; $xx<$ssc; $xx=$xx+1){?>
case <?=$spsx[$xx]?>:
<? } ?>
if (document.all["xhao_"+i].value != "1"){
document.all["Num_"+i].value = "*"; }
break;  // 猴
}
}
break;
case 10:
for (var i=1; i<50; i++) {
switch (i) {
<? $vmvm=Get_sx2_Color("鸡");


$spsx=explode(",",$vmvm);	
$ssc=count($spsx);
for ($xx=0; $xx<$ssc; $xx=$xx+1){?>
case <?=$spsx[$xx]?>:
<? } ?>
if (document.all["xhao_"+i].value != "1"){
document.all["Num_"+i].value = "*";}
 break;  // 雞
}
}
break;
case 11:
for (var i=1; i<50; i++) {
switch (i) {
<? $vmvm=Get_sx2_Color("狗");


$spsx=explode(",",$vmvm);	
$ssc=count($spsx);
for ($xx=0; $xx<$ssc; $xx=$xx+1){?>
case <?=$spsx[$xx]?>:
<? } ?>
if (document.all["xhao_"+i].value != "1"){
document.all["Num_"+i].value = "*"; }
break;  // 狗
}
}
break;
case 12:
for (var i=1; i<50; i++) {
switch (i) {
<? $vmvm=Get_sx2_Color("猪");


$spsx=explode(",",$vmvm);	
$ssc=count($spsx);
for ($xx=0; $xx<$ssc; $xx=$xx+1){?>
case <?=$spsx[$xx]?>:
<? } ?>
if (document.all["xhao_"+i].value != "1"){
document.all["Num_"+i].value = "*"; }
break;  // 豬
}
}
break;
}

}
</SCRIPT>


 <SCRIPT language=JAVASCRIPT>
<!--
var count_win=false;
//window.setTimeout("self.location='quickinput2.php'", 178000);
function CheckKey(){
	// if(event.keyCode == 13) return true;
	// if((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode > 95 || event.keyCode < 106)){alert("下注金额仅能输入数字!!"); return false;}
}

function Chkreset(){
 // document.lt_form.reset();

}



function ChkSubmit(){
    //设定『确定』键为反白 
//	document.all.btnSubmit.disabled = true;

	if (eval(document.all.allgold.innerHTML)<=0 )
	{
		alert("请输入下注金额!!");
	    document.all.btnSubmit.disabled = false;
		return false;

	}else{

       if (!confirm("是否确定下注")){
	   document.all.btnSubmit.disabled = false;
       return false;
       }        
		document.all.gold_all.value=eval(document.all.allgold.innerHTML);
        document.lt_form.submit();
//        document.lt_form.reset();
       document.all.allgold.innerHTML=0;
			document.all.Num_1.value='';
			document.all.Num_2.value='';
			document.all.Num_3.value='';
			document.all.Num_4.value='';
			document.all.Num_5.value='';
			document.all.Num_6.value='';
			document.all.Num_7.value='';
			document.all.Num_8.value='';
			document.all.Num_9.value='';
			document.all.Num_10.value='';
			document.all.Num_11.value='';
			document.all.Num_12.value='';
			document.all.Num_13.value='';
			document.all.Num_14.value='';
			document.all.Num_15.value='';
			document.all.Num_16.value='';
			document.all.Num_17.value='';
			document.all.Num_18.value='';
			document.all.Num_19.value='';
			document.all.Num_20.value='';
			document.all.Num_21.value='';
			document.all.Num_22.value='';
			document.all.Num_23.value='';
			document.all.Num_24.value='';
			document.all.Num_25.value='';
			document.all.Num_26.value='';
			document.all.Num_27.value='';
			document.all.Num_28.value='';
			document.all.Num_29.value='';
			document.all.Num_30.value='';
			document.all.Num_31.value='';
			document.all.Num_32.value='';
			document.all.Num_33.value='';
			document.all.Num_34.value='';
			document.all.Num_35.value='';
			document.all.Num_36.value='';
			document.all.Num_37.value='';
			document.all.Num_38.value='';
			document.all.Num_39.value='';
			document.all.Num_40.value='';
			document.all.Num_41.value='';
			document.all.Num_42.value='';
			document.all.Num_43.value='';
			document.all.Num_44.value='';
			document.all.Num_45.value='';
			document.all.Num_46.value='';
			document.all.Num_47.value='';
			document.all.Num_48.value='';
			document.all.Num_49.value='';
			document.all.Num_50.value='';
			document.all.Num_51.value='';
			document.all.Num_52.value='';
			document.all.Num_53.value='';
			document.all.Num_54.value='';
			document.all.Num_55.value='';
			document.all.Num_56.value='';
			document.all.Num_57.value='';
			document.all.Num_58.value='';
			document.all.Num_59.value='';
			document.all.Num_60.value='';
			document.all.Num_61.value='';
			document.all.Num_62.value='';
			document.all.Num_63.value='';
			document.all.Num_64.value='';
			document.all.Num_65.value='';
			document.all.Num_66.value='';
	}	

}



function CountGold(gold,type,rtype,bb,ffb){
  switch(type) {
  	  case "focus":
  	  	goldvalue = gold.value;
  	  	if (goldvalue=='') goldvalue=0;
  	  	document.all.allgold.innerHTML = eval(document.all.allgold.innerHTML+"-"+goldvalue);
  	  	total_gold.value = document.all.allgold.innerHTML;
  	  	break;
  	  case "blur":
	  if (goldvalue!='')
  	  	{goldvalue = gold.value;
		
  	  	if (goldvalue=='') goldvalue=0;

  	  
if (rtype=='SP') {
var ffbb=ffb-1;
var str1="xr_"+ffbb;
var str2="xrr_"+ffb;

var t_big2 = new Number(document.all[str2].value);
var t_big1 = new Number(document.all[str1].value);
// if (rtype=='SP' && (eval(eval(goldvalue)+eval(t_big1)) >eval(t_big2) )) {gold.focus(); alert("修改数据!!"); return false;}
}
		
		if ( (eval(goldvalue) < <?=ka_memuser("xy")?>) && (goldvalue!='')) {gold.focus(); alert("下注金额不可小於最低限度:<?=ka_memuser("xy")?>!!"); return false;}
		
		if (rtype=='SP' && (eval(eval(bb)+eval(goldvalue)) > <?=ka_memds($xc,3)?>)) {gold.focus(); alert("对不起,止号本期下注金额最高限制 : <?=ka_memds($xc,3)?>!!"); return false;}
		
		if (rtype=='SP' && (eval(goldvalue) > <?=ka_memds($xc,2)?>)) {gold.focus(); alert("对不起,下注金额已超过单注限额 : <?=ka_memds($xc,2)?>!!"); return false;}
		
		
		if (rtype=='dx' && (eval(eval(bb)+eval(goldvalue)) > <?=ka_memds(2,3)?>)) {gold.focus(); alert("对不起,此号本期下注金额最高限制 : <?=ka_memds(2,3)?>!!"); return false;}
		
		if (rtype=='dx' && (eval(goldvalue) > <?=ka_memds(2,2)?>)) {gold.focus(); alert("对不起,下注金额已超过单注限额 : <?=ka_memds(2,2)?>!!"); return false;}
		
		
		if (rtype=='ds' && (eval(eval(bb)+eval(goldvalue)) > <?=ka_memds(3,3)?>)) {gold.focus(); alert("对不起,此号本期下注金额最高限制 : <?=ka_memds(3,3)?>!!"); return false;}
		if (rtype=='ds' && (eval(goldvalue) > <?=ka_memds(3,2)?>)) {gold.focus(); alert("对不起,下注金额已超过单注限额 : <?=ka_memds(3,2)?>!!"); return false;}
		
		if (rtype=='hd' && (eval(eval(bb)+eval(goldvalue)) > <?=ka_memds(4,3)?>)) {gold.focus(); alert("对不起,此号本期下注金额最高限制 : <?=ka_memds(4,3)?>!!"); return false;}
		if (rtype=='hd' && (eval(goldvalue) > <?=ka_memds(4,2)?>)) {gold.focus(); alert("对不起,单注限额最高限制 : <?=ka_memds(4,2)?>!!"); return false;}
		
		if (rtype=='sb' && (eval(eval(bb)+eval(goldvalue)) > <?=ka_memds(10,2)?>)) {gold.focus(); alert("对不起,此号本期下注金额最高限制 : <?=ka_memds(10,3)?>!!"); return false;}
		if (rtype=='sb' && (eval(goldvalue) > <?=ka_memds(10,2)?>)) {gold.focus(); alert("对不起,下注金额已超过单注限额 : <?=ka_memds(10,2)?>!!"); return false;}
		
		
		if (rtype=='jxx' && (eval(eval(bb)+eval(goldvalue)) > <?=ka_memds(24,3)?>)) {gold.focus(); alert("对不起,此号本期下注金额最高限制 : <?=ka_memds(24,3)?>!!"); return false;}
		if (rtype=='jxx' && (eval(goldvalue) > <?=ka_memds(24,2)?>)) {gold.focus(); alert("对不起,下注金额已超过单注限额 : <?=ka_memds(24,2)?>!!"); return false;}
		
		if (rtype=='wdx' && (eval(eval(bb)+eval(goldvalue)) > <?=ka_memds(32,3)?>)) {gold.focus(); alert("对不起,此号本期下注金额最高限制 : <?=ka_memds(32,3)?>!!"); return false;}
		if (rtype=='wdx' && (eval(goldvalue) > <?=ka_memds(32,2)?>)) {gold.focus(); alert("对不起,下注金额已超过单注限额 : <?=ka_memds(32,2)?>!!"); return false;}
		
		if (rtype=='ddx' && (eval(eval(bb)+eval(goldvalue)) > <?=ka_memds(33,3)?>)) {gold.focus(); alert("对不起,此号本期下注金额最高限制 : <?=ka_memds(33,3)?>!!"); return false;}
		if (rtype=='ddx' && (eval(goldvalue) > <?=ka_memds(33,2)?>)) {gold.focus(); alert("对不起,下注金额已超过单注限额 : <?=ka_memds(33,2)?>!!"); return false;}
		
		if (rtype=='dxs' && (eval(eval(bb)+eval(goldvalue)) > <?=ka_memds(34,3)?>)) {gold.focus(); alert("对不起,此号本期下注金额最高限制 : <?=ka_memds(34,3)?>!!"); return false;}
		if (rtype=='dxs' && (eval(goldvalue) > <?=ka_memds(34,2)?>)) {gold.focus(); alert("对不起,下注金额已超过单注限额 : <?=ka_memds(34,2)?>!!"); return false;}
		
		
		total_gold.value = document.all.allgold.innerHTML;
	  	if (eval(document.all.allgold.innerHTML) > <?=ka_memuser("ts")?>)   {gold.focus(); alert("下注金额不可大於可用信用额度!!");    return false;}
		
		}
		      break;
  	  case "keyup":
  	  	goldvalue = gold.value;
  	  	if (goldvalue=='') goldvalue=0;
  	  document.all.allgold.innerHTML = eval(total_gold.value+"\+"+ goldvalue);
  	  	break;
  }
  //alert(goldvalue);
}
-->
</SCRIPT>


 <style type="text/css">
<!--
body {
	/*margin-left: 10px;
	margin-top: 10px;*/
}
.STYLE1 {color: #333}
-->
 </style>

<TABLE  border="0" cellpadding="2" cellspacing="1" bordercolordark="#9b8e25" bgcolor="#CCCCCC" width=780 >
  <TBODY>
 <!-- <tr class="tbtitle">
   <td>
-->
 <?php include("common_qishu.php"); ?>
 <form  name="lt_form" id="lt_form" method="get" action="./main_left.php" style="height:640px;" target="k_meml">
 <input type="hidden" name="title_3d" value="特码" id="title_3d">
 <input type="hidden" name="fc_type" value="9" id="fc_type">
 <input type="hidden" name="ids" value="<?=$ids ?>" id="ids">
 <input type="hidden" name="action" value="n1" id="action">	
 <input type="hidden" name="class2" value="<?=$ids?>" id="class2">
<table style="width:780px" border="0" cellpadding="0" cellspacing="1" class="game_table">
<tbody>
   <tr class="tbtitle2">
    <th colspan="15"><div  style="float:left;line-height:30px;text-align:center;width:100%"><?=$_GET['leixing'] ?></div>
	</th>
  </tr> 
	
    
   <tr class="tbtitle2">

    <td>号码</th>
    <td>赔率</th>
    <td>金额</th>
    <td>号码</th>
    <td>赔率</th>
    <td>金额</th>
    <td>号码</th>
    <td>赔率</th>
    <td>金额</th>
    <td>号码</th>
    <td>赔率</th>
    <td>金额</th>
    <td>号码</th>
    <td>赔率</th>
    <td>金额</th>
  </tr>
    <tr class="tbtitle">
      <td align="center" bgcolor="#FFFFFF" class="ball_r">01</td>
      <td height="25" align="center" valign="middle" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id="bl0" > <?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(1)?>','1');" 
                  onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_1" ID="Num_1"  />
          <input name="class3_1" value="1" type="hidden" >
          <input name="gb1" type="hidden"  value="0">
          <input name="xr_0" type="hidden" id="xr_0" value="0" >
          <input name="xrr_1" type="hidden"  value="0" ></td>
      <td align="center" bgcolor="#FFFFFF" class="ball_g">11</td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id="bl10"> <?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(11)?>','11');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';"     style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_11" id="Num_11"/>
          <input name="class3_11" value="11" type="hidden" >
          <input name="gb11" type="hidden"  value="0">
		    <input name="xr_10" type="hidden" id="xr_10" value="0" >
          <input name="xrr_11" type="hidden"  value="0" >		  </td>
      <td align="center" bgcolor="#FFFFFF" class="ball_g">21</td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl20><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(21)?>','21');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_21"  id="Num_21"/>
          <input name="gb21" type="hidden"  value="0">
          <input name="class3_21" value="21" type="hidden" >
		   <input name="xr_20" type="hidden" id="xr_20" value="0" >
          <input name="xrr_21" type="hidden" id="xrr_21" value="0">		  </td>
      <td align="center" bgcolor="#FFFFFF" class="ball_b">31</td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id="bl30"> <?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(31)?>','31');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_31" id="Num_31"/>
          <input name="class3_31" value="31" type="hidden" >
          <input name="gb31" type="hidden"  value="0">
		   <input name="xr_30" type="hidden" id="xr_30" value="0" >
          <input name="xrr_31" type="hidden" id="xrr_31" value="0">		  </td>
      <td align="center" bgcolor="#FFFFFF" class="ball_b">41</td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl40> <?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(41)?>','41');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_41"  id="Num_41" />
          <input name="class3_41" value="41" type="hidden" >
          <input name="gb41" type="hidden"  value="0">
		   <input name="xr_40" type="hidden" id="xr_40" value="0" >
          <input name="xrr_41" type="hidden" id="xrr_41" value="0"></td>
    </tr>
    <tr class="tbtitle">
      <td align="center" bgcolor="#FFFFFF" class="ball_r">02</td>
      <td height="25" align="center" valign="middle" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl1> <?=$data_bet['0']['rate'] ?></span><span rate="true1"> </span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(2)?>','2');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_2" id="Num_2"/>
          <input name="class3_2" value="2" type="hidden" >
          <input name="gb2" type="hidden"  value="0">
		  
		   <input name="xr_1" type="hidden" id="xr_1" value="0" >
          <input name="xrr_2" type="hidden" id="xrr_2" value="0" ></td>
      <td align="center" bgcolor="#FFFFFF" class="ball_r">12</td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl11> <?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(12)?>','12');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';"     style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_12"  id="Num_12"/>
          <input name="class3_12" value="12" type="hidden" >
          <input name="gb12" type="hidden"  value="0">
		   <input name="xr_11" type="hidden" id="xr_11" value="0" >
          <input name="xrr_12" type="hidden" id="xrr_12" value="0" >		  </td>
      <td align="center" bgcolor="#FFFFFF" class="ball_g">22</td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id="bl21"> <?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(22)?>','22');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_22" id="Num_22"/>
          <input name="gb22" type="hidden"  value="0">
          <input name="class3_22" value="22" type="hidden" >
		   <input name="xr_21" type="hidden" id="xr_21" value="0" >
          <input name="xrr_22" type="hidden" id="xrr_22" value="0" ></td>
      <td align="center" bgcolor="#FFFFFF" class="ball_g">32</td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl31> <?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(32)?>','32');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_32" id="Num_32"/>
          <input name="class3_32" value="32" type="hidden" >
          <input name="gb32" type="hidden"  value="0">
		  
		   <input name="xr_31" type="hidden" id="xr_31" value="0" >
          <input name="xrr_32" type="hidden" id="xrr_32" value="0" ></td>
      <td align="center" bgcolor="#FFFFFF" class="ball_b">42</td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl41> <?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(42)?>','42');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_42" id="Num_42" />
          <input name="class3_42" value="42" type="hidden" >
          <input name="gb42" type="hidden"  value="0">
		   <input name="xr_41" type="hidden" id="xr_41" value="0" >
          <input name="xrr_42" type="hidden" id="xrr_42" value="0" ></td>
    </tr>
    <tr class="tbtitle">
      <td align="center" bgcolor="#FFFFFF" class="ball_b"><span rate="true1" class="ball_r">03</span></td>
      <td height="25" align="center" valign="middle" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl2> 
	  <?=$data_bet['0']['rate'] ?></span><span rate="true1"> </span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(3)?>','3');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_3" id="Num_3" />
          <input name="class3_3" value="3" type="hidden" >
          <input name="gb3" type="hidden"  value="0">
		   <input name="xr_2" type="hidden" id="xr_2" value="0" >
          <input name="xrr_3" type="hidden" id="xrr_3" value="0" >		  </td>
      <td align="center" bgcolor="#FFFFFF" class="ball_r"><span rate="true1" class="ball_r">13</span></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl12>  <?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(13)?>','13');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';"     style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_13"  id="Num_13"/>
          <input name="class3_13" value="13" type="hidden" >
          <input name="gb13" type="hidden"  value="0">
		  
		   <input name="xr_12" type="hidden" id="xr_12" value="0" >
          <input name="xrr_13" type="hidden" id="xrr_13" value="0" >		  </td>
      <td align="center" bgcolor="#FFFFFF" class="ball_r"><span rate="true1" class="ball_r">23</span></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl22><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(23)?>','23');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_23" id="Num_23"/>
          <input name="gb23" type="hidden"  value="0">
          <input name="class3_23" value="23" type="hidden" >
		   <input name="xr_22" type="hidden" id="xr_22" value="0" >
          <input name="xrr_23" type="hidden" id="xrr_23" value="0" ></td>
      <td align="center" bgcolor="#FFFFFF" class="ball_g"><span rate="true1" class="ball_r">33</span></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl32><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(33)?>','33');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_33" id="Num_33" />
          <input name="class3_33" value="33" type="hidden" >
          <input name="gb33" type="hidden"  value="0">
		   <input name="xr_32" type="hidden" id="xr_32" value="0" >
          <input name="xrr_33" type="hidden" id="xrr_33" value="0" >		  </td>
      <td align="center" bgcolor="#FFFFFF" class="ball_g"><span rate="true1" class="ball_r">43</span></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl42><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(43)?>','43');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_43" id="Num_43" />
          <input name="class3_43" value="43" type="hidden" >
          <input name="gb43" type="hidden"  value="0">
		  
		   <input name="xr_42" type="hidden" id="xr_42" value="0" >
          <input name="xrr_43" type="hidden" id="xrr_43" value="0" ></td>
    </tr>
    <tr class="tbtitle">
      <td align="center" bgcolor="#FFFFFF" class="ball_b"><span rate="true1" class="ball_r">04</span></td>
      <td height="25" align="center" valign="middle" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl3><?=$data_bet['0']['rate'] ?></span><span rate="true1"> </span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(4)?>','4');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_4" id="Num_4"/>
          <input name="class3_4" value="4" type="hidden" >
          <input name="gb4" type="hidden"  value="0">
		  
		   <input name="xr_3" type="hidden" id="xr_3" value="0" >
          <input name="xrr_4" type="hidden" id="xrr_4" value="0" ></td>
      <td align="center" bgcolor="#FFFFFF" class="ball_b"><span rate="true1" class="ball_r">14</span></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl13><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(14)?>','14');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';"     style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_14"  id="Num_14"/>
          <input name="class3_14" value="14" type="hidden" >
          <input name="gb14" type="hidden"  value="0">
		  
		  <input name="xr_13" type="hidden" id="xr_13" value="0" >
          <input name="xrr_14" type="hidden" id="xrr_14" value="0" >		  </td>
      <td align="center" bgcolor="#FFFFFF" class="ball_r"><span rate="true1" class="ball_r">24</span></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl23><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onkeypress="return CheckKey();" 
                        onblur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(24)?>','24');" 
                        onkeyup="return CountGold(this,'keyup');" 
                        onfocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_24"  id="Num_24" />
      <input name="gb24" type="hidden"  value="0">
          <input name="class3_24" value="24" type="hidden" >
		  <input name="xr_23" type="hidden" id="xr_23" value="0" >
          <input name="xrr_24" type="hidden" id="xrr_24" value="0" ></td>
      <td align="center" bgcolor="#FFFFFF" class="ball_r"><span rate="true1" class="ball_r">34</span></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl33><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(34)?>','34');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_34" id="Num_34" />
          <input name="class3_34" value="34" type="hidden" >
          <input name="gb34" type="hidden"  value="0">
		  
		  <input name="xr_33" type="hidden" id="xr_33" value="0" >
          <input name="xrr_34" type="hidden" id="xrr_34" value="0" ></td>
      <td align="center" bgcolor="#FFFFFF" class="ball_g"><span rate="true1" class="ball_r">44</span></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl43><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(44)?>','44');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_44" id="Num_44" />
          <input name="class3_44" value="44" type="hidden" >
          <input name="gb44" type="hidden"  value="0">
		  
		  <input name="xr_43" type="hidden" id="xr_43" value="0" >
          <input name="xrr_44" type="hidden" id="xrr_44" value="0" ></td>
    </tr>
    <tr class="tbtitle">
      <td align="center" bgcolor="#FFFFFF" class="ball_g"><span rate="true1" class="ball_r">05</span></td>
      <td height="25" align="center" valign="middle" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl4><?=$data_bet['0']['rate'] ?></span><span rate="true1"> </span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(5)?>','5');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_5" id="Num_5"/>
          <input name="class3_5" value="5" type="hidden" >
          <input name="gb5" type="hidden"  value="0">
		  <input name="xr_4" type="hidden"  value="0" >
          <input name="xrr_5" type="hidden"  value="0" >		  </td>
      <td align="center" bgcolor="#FFFFFF" class="ball_b"><span rate="true1" class="ball_r">15</span></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl14><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(15)?>','15');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';"     style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_15"  id="Num_15" />
          <input name="class3_15" value="15" type="hidden" >
          <input name="gb15" type="hidden"  value="0">
		  
		    <input name="xr_14" type="hidden"  value="0" >
          <input name="xrr_15" type="hidden"  value="0" ></td>
      <td align="center" bgcolor="#FFFFFF" class="ball_b"><span rate="true1" class="ball_r">25</span></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl24><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(25)?>','25');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_25" id="Num_25" />
          <input name="gb25" type="hidden"  value="0">
          <input name="class3_25" value="25" type="hidden" >
		    <input name="xr_24" type="hidden"  value="0" >
          <input name="xrr_25" type="hidden"  value="0" ></td>
      <td align="center" bgcolor="#FFFFFF" class="ball_r"><span rate="true1" class="ball_r">35</span></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl34><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(35)?>','35');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_35" id="Num_35"  />
          <input name="class3_35" value="35" type="hidden" >
          <input name="gb35" type="hidden"  value="0">
		    <input name="xr_34" type="hidden"  value="0" >
          <input name="xrr_35" type="hidden"  value="0" ></td>
      <td align="center" bgcolor="#FFFFFF" class="ball_r"><span rate="true1" class="ball_r">45</span></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl44><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(45)?>','45');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_45"  id="Num_45" />
          <input name="class3_45" value="45" type="hidden" >
          <input name="gb45" type="hidden"  value="0">
		  
		    <input name="xr_44" type="hidden"  value="0" >
          <input name="xrr_45" type="hidden"  value="0" ></td>
    </tr>
    <tr class="tbtitle">
      <td align="center" bgcolor="#FFFFFF" class="ball_g"><span rate="true1" class="ball_r">06</span></td>
      <td height="25" align="center" valign="middle" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl5><?=$data_bet['0']['rate'] ?></span><span rate="true1"> </span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(6)?>','6');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_6"  id="Num_6"/>
          <input name="class3_6" value="6" type="hidden" >
          <input name="gb6" type="hidden"  value="0">
          <input name="xr_5" type="hidden"  value="0" >
          <input name="xrr_6" type="hidden"  value="0" >     </td>
      <td align="center" bgcolor="#FFFFFF" class="ball_g"><span rate="true1" class="ball_r">16</span></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl15> <?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(16)?>','16');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';"     style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_16" id="Num_16"/>
          <input name="class3_16" value="16" type="hidden" >
          <input name="gb16" type="hidden"  value="0">
		  
		    <input name="xr_15" type="hidden"  value="0" >
          <input name="xrr_16" type="hidden"  value="0" > </td>
      <td align="center" bgcolor="#FFFFFF" class="ball_b"><span rate="true1" class="ball_r">26</span></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl25><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(26)?>','26');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_26" id="Num_26" />
          <input name="gb26" type="hidden"  value="0">
          <input name="class3_26" value="26" type="hidden" >
		  
		    <input name="xr_25" type="hidden"  value="0" >
          <input name="xrr_26" type="hidden"  value="0" > </td>
      <td align="center" bgcolor="#FFFFFF" class="ball_b"><span rate="true1" class="ball_r">36</span></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl35><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(36)?>','36');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_36" id="Num_36" />
          <input name="class3_36" value="36" type="hidden" >
          <input name="gb36" type="hidden"  value="0">
		  
		    <input name="xr_35" type="hidden"  value="0" >
          <input name="xrr_36" type="hidden"  value="0" > </td>
      <td align="center" bgcolor="#FFFFFF" class="ball_r"><span rate="true1" class="ball_r">46</span></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl45><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(46)?>','46');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_46" id="Num_46" />
          <input name="class3_46" value="46" type="hidden" >
          <input name="gb46" type="hidden"  value="0">
		  
		    <input name="xr_45" type="hidden"  value="0" >
          <input name="xrr_46" type="hidden"  value="0" > </td>
    </tr>
    <tr class="tbtitle">
      <td align="center" bgcolor="#FFFFFF" class="ball_r">07</td>
      <td height="25" align="center" valign="middle" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl6><?=$data_bet['0']['rate'] ?></span><span rate="true1"> </span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(7)?>','7');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_7"  id="Num_7" />
          <input name="class3_7" value="7" type="hidden" >
          <input name="gb7" type="hidden"  value="0">
		  
		    <input name="xr_6" type="hidden"  value="0" >
          <input name="xrr_7" type="hidden"  value="0" > </td>
      <td align="center" bgcolor="#FFFFFF" class="ball_g">17</td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl16><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(17)?>','17');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';"     style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_17"  id="Num_17"/>
          <input name="class3_17" value="17" type="hidden" >
          <input name="gb17" type="hidden"  value="0">
		  
		   <input name="xr_16" type="hidden"  value="0" >
          <input name="xrr_17" type="hidden"  value="0" ></td>
      <td align="center" bgcolor="#FFFFFF" class="ball_g">27</td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl26><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(27)?>','27');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_27" id="Num_27"/>
          <input name="gb27" type="hidden"  value="0">
          <input name="class3_27" value="27" type="hidden" >
          <input name="xr_26" type="hidden"  value="0" >
          <input name="xrr_27" type="hidden"  value="0" >    </td>
      <td align="center" bgcolor="#FFFFFF" class="ball_b">37</td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl36><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(37)?>','37');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_37"  id="Num_37"  />
          <input name="class3_37" value="37" type="hidden" >
          <input name="gb37" type="hidden"  value="0">
		  
		   <input name="xr_36" type="hidden"  value="0" >
          <input name="xrr_37" type="hidden"  value="0" ></td>
      <td align="center" bgcolor="#FFFFFF" class="ball_b">47</td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl46><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(47)?>','47');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_47" id="Num_47"  />
          <input name="class3_47" value="47" type="hidden" >
          <input name="gb47" type="hidden"  value="0">
		   <input name="xr_46" type="hidden"  value="0" >
          <input name="xrr_47" type="hidden"  value="0" ></td>
    </tr>
    <tr class="tbtitle">
      <td align="center" bgcolor="#FFFFFF" class="ball_r">08</td>
      <td height="25" align="center" valign="middle" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl7><?=$data_bet['0']['rate'] ?></span><span rate="true1"> </span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(8)?>','8');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_8"  id="Num_8"/>
          <input name="class3_8" value="8" type="hidden" >
          <input name="gb8" type="hidden"  value="0">
		  
		   <input name="xr_7" type="hidden"  value="0" >
          <input name="xrr_8" type="hidden"  value="0" ></td>
      <td align="center" bgcolor="#FFFFFF" class="ball_r">18</td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl17><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(18)?>','18');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';"     style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_18"  id="Num_18" />
          <input name="class3_18" value="18" type="hidden" >
          <input name="gb18" type="hidden"  value="0">
		  
		    <input name="xr_17" type="hidden"  value="0" >
          <input name="xrr_18" type="hidden"  value="0" ></td>
      <td align="center" bgcolor="#FFFFFF" class="ball_g">28</td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl27><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(28)?>','28');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_28"  id="Num_28" />
          <input name="gb28" type="hidden"  value="0">
          <input name="class3_28" value="28" type="hidden" >
		  
		    <input name="xr_27" type="hidden"  value="0" >
          <input name="xrr_28" type="hidden"  value="0" ></td>
      <td align="center" bgcolor="#FFFFFF" class="ball_g">38</td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl37><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(38)?>','38');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_38" id="Num_38" />
          <input name="class3_38" value="38" type="hidden" >
          <input name="gb38" type="hidden"  value="0">
		  
		    <input name="xr_37" type="hidden"  value="0" >
          <input name="xrr_38" type="hidden"  value="0" ></td>
      <td align="center" bgcolor="#FFFFFF" class="ball_b">48</td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl47><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(48)?>','48');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_48" id="Num_48"  />
          <input name="class3_48" value="48" type="hidden" >
          <input name="gb48" type="hidden"  value="0">
		  
		    <input name="xr_47" type="hidden"  value="0" >
          <input name="xrr_48" type="hidden"  value="0" ></td>
    </tr>
    <tr class="tbtitle">
      <td align="center" bgcolor="#FFFFFF" class="ball_b"><span rate="true1" class="ball_r">09</span></td>
      <td height="25" align="center" valign="middle" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl8><?=$data_bet['0']['rate'] ?></span><span rate="true1"> </span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(9)?>','9');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_9" id="Num_9" />
          <input name="class3_9" value="9" type="hidden" >
          <input name="gb9" type="hidden"  value="0">
          <input name="xr_8" type="hidden"  value="0" >
          <input name="xrr_9" type="hidden"  value="0" >		       </td>
      <td align="center" bgcolor="#FFFFFF" class="ball_r"><span rate="true1" class="ball_r">19</span></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl18><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(19)?>','19');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';"     style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_19"  id="Num_19"/>
          <input name="class3_19" value="19" type="hidden" >
          <input name="gb19" type="hidden"  value="0">
		  
		   <input name="xr_18" type="hidden"  value="0" >
          <input name="xrr_19" type="hidden"  value="0" ></td>
      <td align="center" bgcolor="#FFFFFF" class="ball_r"><span rate="true1" class="ball_r">29</span></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl28><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(29)?>','29');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_29" id="Num_29"/>
          <input name="gb29" type="hidden"  value="0">
          <input name="class3_29" value="29" type="hidden" >
		  
		   <input name="xr_28" type="hidden"  value="0" >
          <input name="xrr_29" type="hidden"  value="0" ></td>
      <td align="center" bgcolor="#FFFFFF" class="ball_g"><span rate="true1" class="ball_r">39</span></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl38><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(39)?>','39');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_39" id="Num_39" />
          <input name="class3_39" value="39" type="hidden" >
          <input name="gb39" type="hidden"  value="0">
		  
		   <input name="xr_38" type="hidden"  value="0" >
          <input name="xrr_39" type="hidden"  value="0" ></td>
      <td align="center" bgcolor="#FFFFFF" class="ball_g"><span rate="true1" class="ball_r">49</span></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl48><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(49)?>','49');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_49" id="Num_49" />
          <input name="class3_49" value="49" type="hidden" >
          <input name="gb49" type="hidden"  value="0">
		  
		   <input name="xr_48" type="hidden"  value="0" >
          <input name="xrr_49" type="hidden"  value="0" ></td>
    </tr>







<!-- ------------------------------------------ -->
    <tr class="tbtitle">

      <td align="center" bgcolor="#FFFFFF" class="ball_b"><span rate="true1" class="ball_r">10</span></td>
      <td height="25" align="center" valign="middle" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl9><?=$data_bet['0']['rate'] ?></span><span rate="true1"> </span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(10)?>','10');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_10" id="Num_10"/>
          <input name="class3_10" value="10" type="hidden" >
          <input name="gb10" type="hidden"  value="0">
		  
		  
		   <input name="xr_9" type="hidden"  value="0" >
          <input name="xrr_10" type="hidden"  value="0" ></td>
      

      <td align="center" bgcolor="#FFFFFF" class="ball_b"><span rate="true1" class="ball_r">20</span></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl19><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(20)?>','20');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';"     style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_20"  id="Num_20"/>
          <input name="class3_20" value="20" type="hidden" >
          <input name="gb20" type="hidden"  value="0">
		  
		  <input name="xr_19" type="hidden"  value="0" >
          <input name="xrr_20" type="hidden"  value="0" ></td>
     

      <td align="center" bgcolor="#FFFFFF" class="ball_r"><span rate="true1" class="ball_r">30</span></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl29> <?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input onKeyPress="return CheckKey();" onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(30)?>','30');" onKeyUp="return CountGold(this,'keyup');" onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_30"  id="Num_30"/>
          <input name="gb30" type="hidden"  value="0">
          <input name="class3_30" value="30" type="hidden" >
		  <input name="xr_29" type="hidden"  value="0" >
          <input name="xrr_30" type="hidden"  value="0" ></td>
     

      <td align="center" bgcolor="#FFFFFF" class="ball_r"><span rate="true1" class="ball_r">40</span></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><b><span rate="true1" id=bl39><?=$data_bet['0']['rate'] ?></span></b></td>
      <td height="25" align="center" bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';this.className='inp1';return CountGold(this,'blur','SP','<?=ka_kk1(40)?>','40');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_40" id="Num_40" />
          <input name="class3_40" value="40" type="hidden" >
          <input name="gb40" type="hidden"  value="0">
		  <input name="xr_39" type="hidden"  value="0" >
          <input name="xrr_40" type="hidden"  value="0" ></td>
  
			<td class="ball_ff" colspan="3">&nbsp;</td>


    </tr>
    <!-- ------------------------------------------ -->
    <tr class="tbtitle">

     <td class="ball_bg">特码单</td>
          <td  width="0" class="ball_ff"><b><span rate="true1" id="bl49"><?=$data_bet['49']['rate'] ?></span></b></td>
          <td  width="78"  bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';return CountGold(this,'blur','dx','<?=ka_kk1("单")?>');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_50" id="Num_50"/>
          <input name="gb50" type="hidden"  value="0">
          <input name="class3_50" value="单" type="hidden" >
          </td>
      

  <td class="ball_bg">特码双</td>
          <td  width="0" class="ball_ff"><b><span rate="true1" id="bl50"><?=$data_bet['50']['rate'] ?></span></b></td>
          <td  width="78"  bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';return CountGold(this,'blur','dx','<?=ka_kk1("双")?>');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_51" id="Num_51" />
          <input name="gb51" type="hidden"  value="0">
          <input name="class3_51" value="双" type="hidden" ></td>

     <td class="ball_bg ball_reb" >红　波</td>
          <td  width="0" class="ball_ff"><b><span rate="true1" id="bl55"><?=$data_bet['55']['rate'] ?></span></b></td>
          <td  width="78"  bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';return CountGold(this,'blur','sb','<?=ka_kk1("红波")?>');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_56" id="Num_56" />
          <input name="gb56" type="hidden"  value="0">
          <input name="class3_56" value="红波" type="hidden" ></td>


     <td class="ball_bg">特尾大</td>
          <td  width="0" class="ball_ff"><b><span rate="true1" id="bl60"> <?=$data_bet['60']['rate'] ?></span></b></td>
          <td  width="78"  bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';return CountGold(this,'blur','wdx','<?=ka_kk1("尾大")?>');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_61" id="Num_61" />
          <input name="gb61" type="hidden"  value="0">
          <input name="class3_61" value="尾大" type="hidden" ></td>
  
		 <td class="ball_bg">特尾小</td>
          <td  width="0" class="ball_ff"><b><span rate="true1" id="bl61"> <?=$data_bet['61']['rate'] ?></span></b></td>
          <td  width="78"  bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';return CountGold(this,'blur','wdx','<?=ka_kk1("尾小")?>');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_62"  id="Num_62"/>
          <input name="gb62" type="hidden"  value="0">
          <input name="class3_62" value="尾小" type="hidden" ></td>


    </tr>

  <!-- ------------------------------------------ -->
    <tr class="tbtitle">

      <td class="ball_bg">家禽</td>
          <td  width="0" class="ball_ff"><b><span rate="true1" id="bl58"><?=$data_bet['58']['rate'] ?></span></b></td>
          <td  width="78"  bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';return CountGold(this,'blur','jxx','<?=ka_kk1("家禽")?>');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_59" id="Num_59" />
          <input name="gb59" type="hidden"  value="0">
          <input name="class3_59" value="家禽" type="hidden" ></td>
      

     <td class="ball_bg" width=78>特码大</td>
          <td  width="0" class="ball_ff"><b><span rate="true1" id=bl51><?=$data_bet['51']['rate'] ?></span></b></td>
          <td  width=78  bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';return CountGold(this,'blur','ds','<?=ka_kk1("大")?>');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_52" id="Num_52" />
          <input name="gb52" type="hidden"  value="0">
          <input name="class3_52" value="大" type="hidden" ></td>

      <td class="ball_bg" width=78>特码小</td>
          <td  width="0" class="ball_ff"><b><span rate="true1" id=bl52><?=$data_bet['52']['rate'] ?></span></b></td>
          <td  width=78  bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';return CountGold(this,'blur','ds','<?=ka_kk1("小")?>');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_53" id="Num_53" />
          <input name="gb53" type="hidden"  value="0">
          <input name="class3_53" value="小" type="hidden" ></td>
          

     <td class="ball_bg ball_blue">蓝　波</td>
          <td  width="0" class="ball_ff"><b><span rate="true1" id=bl57><?=$data_bet['57']['rate'] ?></span></b></td>
          <td  width=78  bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';return CountGold(this,'blur','sb','<?=ka_kk1("蓝波")?>');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" maxlength="6" size="3" name="Num_58"  id="Num_58"/>
          <input name="gb58" type="hidden"  value="0">
          <input name="class3_58" value="蓝波" type="hidden" ></td>
  
	  <td class="ball_bg" width=78>大单</td>
          <td  width="0" class="ball_ff"><b><span rate="true1" id=bl62> <?=$data_bet['62']['rate'] ?></span></b></td>
          <td  width=78  bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';return CountGold(this,'blur','ddx','<?=ka_kk1("大单")?>');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_63" id="Num_63" />
          <input name="gb63" type="hidden"  value="0">
          <input name="class3_63" value="大单" type="hidden" ></td>


    </tr>
<!-- ------------------------------------------ -->
    <tr class="tbtitle">

       <td class="ball_bg" width=78>小单</td>
          <td  width="0" class="ball_ff"><b><span rate="true1" id=bl63> <?=$data_bet['63']['rate'] ?></span></b></td>
          <td  width=78  bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';return CountGold(this,'blur','ddx','<?=ka_kk1("小单")?>');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_64" id="Num_64" />
          <input name="gb64" type="hidden"  value="0">
          <input name="class3_64" value="小单" type="hidden" ></td>
      
 <td class="ball_bg" width=78>野兽</td>
          <td  width="0" class="ball_ff"><b><span rate="true1" id=bl59> <?=$data_bet['59']['rate'] ?></span></b></td>
          <td  width=78  bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';return CountGold(this,'blur','jxx','<?=ka_kk1("野兽")?>');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_60" id="Num_60" />
          <input name="gb60" type="hidden"  value="0">
          <input name="class3_60" value="野兽" type="hidden" ></td>

      <td class="ball_bg" width=78>合数单</td>
          <td  width="0" class="ball_ff"><b><span rate="true1" id=bl53><?=$data_bet['53']['rate'] ?></span></b></td>
          <td  width=78  bgcolor="#ffffff" class="ball_ff"><input 
			  
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';return CountGold(this,'blur','hd','<?=ka_kk1("合单")?>');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_54" id="Num_54" />
          <input name="gb54" type="hidden"  value="0">
          <input name="class3_54" value="合单" type="hidden" ></td>
          

    <td class="ball_bg" width=78>合数双</td>
          <td  width="0" class="ball_ff"><b><span rate="true1" id=bl54><?=$data_bet['54']['rate'] ?></span></b></td>
          <td  width=78  bgcolor="#ffffff" class="ball_ff"><input 
			  
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';return CountGold(this,'blur','hd','<?=ka_kk1("合双")?>');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_55" id="Num_55" />
          <input name="gb55" type="hidden"  value="0">
          <input name="class3_55" value="合双" type="hidden" ></td>
  
	  <td class="ball_bg ball_gree">绿　波</td>
          <td  width="0" class="ball_ff"><b><span rate="true1" id="bl56"><?=$data_bet['56']['rate'] ?></span></b></td>
          <td  width="78"  bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';return CountGold(this,'blur','sb','<?=ka_kk1("绿波")?>');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_57"  id="Num_57" />
          <input name="gb57" type="hidden"  value="0">
          <input name="class3_57" value="绿波" type="hidden" ></td>

    </tr>

<!-- ------------------------------------------ -->
    <tr class="tbtitle">

       <td class="ball_bg" width=78>大双</td>
          <td  width="0" class="ball_ff"><b><span rate="true1" id=bl64> <?=$data_bet['64']['rate'] ?></span></b></td>
          <td  width=78  bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';return CountGold(this,'blur','dxs','<?=ka_kk1("大双")?>');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_65" id="Num_65" />
          <input name="gb65" type="hidden"  value="0">
          <input name="class3_65" value="大双" type="hidden" ></td>
      
  <td class="ball_bg" width=78>小双</td>
          <td  width="0" class="ball_ff"><b><span rate="true1" id=bl65> <?=$data_bet['65']['rate'] ?></span></b></td>
          <td  width=78  bgcolor="#ffffff" class="ball_ff"><input 
			  onKeyPress="return CheckKey();" 
                        onBlur="this.className='inp1';return CountGold(this,'blur','dxs','<?=ka_kk1("小双")?>');" 
                        onKeyUp="return CountGold(this,'keyup');" 
                        onFocus="this.className='inp1m';CountGold(this,'focus');this.value='';" 
      style="HEIGHT: 18px"  class="" size="3" type='text' name="Num_66"  id="Num_66"/>
          <input name="gb66" type="hidden"  value="0">
          <input name="class3_66" value="小双" type="hidden" ></td>

     <td colspan="9"></td>

    </tr>

    <INPUT type="hidden"  value="0" name="gold_all">
  <tr class="hset2">
  <td colspan="15" style="text-align:center;" class="tbtitle">
  <input name="btnSubmit"   type="button"  id="btnSubmit" value="投注" class="button_a" onclick="document.getElementById('lt_form').submit();" />
&nbsp;&nbsp;<input type="reset"  onclick="javascript:document.all.allgold.innerHTML =0;" name="Submit3" value="重设" class="button_a" />      
</td>   
 </tr>
</form>

   <? for($bb=1;$bb<=66;$bb=$bb+1){
			?>
              <input name="xhao_<?=$bb?>" type="hidden" id="xhao_<?=$bb?>" value="0" />
              <? }?>        
</table>








<script>
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_changeProp(objName,x,theProp,theValue) { //v6.0
  var obj = MM_findObj(objName);
  if (obj && (theProp.indexOf("style.")==-1 || obj.style)){
    if (theValue == true || theValue == false)
      eval("obj."+theProp+"="+theValue);
    else eval("obj."+theProp+"='"+theValue+"'");
  }
}


function makeRequest(url) {

    http_request = false;
   
    if (window.XMLHttpRequest) {
   
        http_request = new XMLHttpRequest();
   
        if (http_request.overrideMimeType){
   
            http_request.overrideMimeType('text/xml');
   
        }
   
    } else if (window.ActiveXObject) {
   
        try{
       
            http_request = new ActiveXObject("Msxml2.XMLHTTP");
       
        } catch (e) {
       
            try {
           
                http_request = new ActiveXObject("Microsoft.XMLHTTP");
           
            } catch (e) {
       
            }
   
        }

     }
     if (!http_request) {
     
        alert("Your browser nonsupport operates at present, please use IE 5.0 above editions!");
       
        return false;
       
     }
 

//method init,no init();
 http_request.onreadystatechange = init;
 
 http_request.open('GET', url, true);

//Forbid IE to buffer memory
 http_request.setrequestHeader("If-Modified-Since","0");

//send count
 http_request.send(null);

//Updated every two seconds a page
 setTimeout("makeRequest('"+url+"')", <?=$ftime?>);

}


function init() {
 
    if (http_request.readyState == 4) {
   
        if (http_request.status == 0 || http_request.status == 200) {
       
            var result = http_request.responseText;
			
           
            if(result==""){
           
                result = "Access failure ";
           
            }
           
		   var arrResult = result.split("###");	
		   for(var i=0;i<66;i++)
{	   
		   arrTmp = arrResult[i].split("@@@");
		   


num1 = arrTmp[0]; //字段num1的值
num2 = parseFloat(arrTmp[1]).toFixed(2); //字段num2的值
num3 = parseFloat(arrTmp[2]).toFixed(2); //字段num1的值
num4 = arrTmp[3]; //字段num2的值
num5 = arrTmp[4]; //字段num2的值
num6 = arrTmp[5]; //字段num2的值


if (i<49){
document.all["xr_"+i].value = num4;
var sb=i+1
document.all["xrr_"+sb].value = num5;
}

var sbbn=i+1
if (num6==1){
MM_changeProp('num_'+sbbn,'','disabled','1','INPUT/text')
if (sbbn<=49){
document.all["xhao_"+sbbn].value = num6;}
}


var bl;
bl="bl"+i;

if (num6==1){
document.all[bl].innerHTML= "停";
}else{
<? $bb=ka_memuser("abcd");
 switch ($bb){
	case "A": ?>
	if (num2!=num3){
	document.all[bl].innerHTML= "<span  STYLE='background-color:ffff00;WIDTH: 100%;height:25px;vertical-align:middle;' ><span  STYle='display:inline-block;height:100%;vertical-align:middle;'></span><font color=ff0000><b>"+num2+"</b></font></span>";
	}else{
	document.all[bl].innerHTML= num2;}
	
<?	break;
case "B":?>
if (i<=48){
if (num2!=num3){
	document.all[bl].innerHTML= "<span  STYLE='background-color:ffff00;WIDTH: 100%;height:25px;vertical-align:middle;' ><span  STYle='display:inline-block;height:100%;vertical-align:middle;'></span><font color=ff0000><b>"+eval(Math.round(num2*100)+"-<?=$btm*100?>")/100+"</b></font></span>";
	}else{
document.all[bl].innerHTML= eval(Math.round(num2*100)+"-<?=$btm*100?>")/100;}

}else{
if (num2!=num3){
	document.all[bl].innerHTML= "<span  STYLE='background-color:ffff00;WIDTH: 100%;height:25px;vertical-align:middle;' ><span  STYle='display:inline-block;height:100%;vertical-align:middle;'></span><font color=ff0000><b>"+eval(Math.round(num2*100)+"-<?=$btmdx*100?>")/100+"</b></font></span>";
	}else{document.all[bl].innerHTML= eval(Math.round(num2*100)+"-<?=$btmdx*100?>")/100;}
	}
	<?
	break;
	case "C":?>
if (i<=48){
if (num2!=num3){
	document.all[bl].innerHTML= "<span  STYLE='background-color:ffff00;WIDTH: 100%;height:25px;vertical-align:middle;' ><span  STYle='display:inline-block;height:100%;vertical-align:middle;'></span><font color=ff0000><b>"+eval(Math.round(num2*100)+"-<?=$ctm*100?>")/100+"</b></font></span>";
	}else{
document.all[bl].innerHTML= eval(Math.round(num2*100)+"-<?=$ctm*100?>")/100;
}
}else{
if (num2!=num3){
	document.all[bl].innerHTML= "<span  STYLE='background-color:ffff00;WIDTH: 100%;height:25px;vertical-align:middle;' ><span  STYle='display:inline-block;height:100%;vertical-align:middle;'></span><font color=ff0000><b>"+eval(Math.round(num2*100)+"-<?=$ctmdx*100?>")/100+"</b></font></span>";
	}else{document.all[bl].innerHTML= eval(Math.round(num2*100)+"-<?=$ctmdx*100?>")/100;
}
	}
	<?
	break;
	case "D":?>


if (i<=48){
if (num2!=num3){
	document.all[bl].innerHTML= "<span  STYLE='background-color:ffff00;WIDTH: 100%;height:25px;vertical-align:middle;' ><span  STYle='display:inline-block;height:100%;vertical-align:middle;'></span><font color=ff0000><b>"+ eval(Math.round(num2*100)+"-<?=$dtm*100?>")/100+"</b></font></span>";
	}else{
document.all[bl].innerHTML= eval(Math.round(num2*100)+"-<?=$dtm*100?>")/100;}

}else{
if (num2!=num3){
	document.all[bl].innerHTML= "<span  STYLE='background-color:ffff00;WIDTH: 100%;height:25px;vertical-align:middle;' ><span  STYle='display:inline-block;height:100%;vertical-align:middle;'></span><font color=ff0000><b>"+eval(Math.round(num2*100)+"-<?=$dtmdx*100?>")/100+"</b></font></span>";
	}else{document.all[bl].innerHTML= eval(Math.round(num2*100)+"-<?=$dtmdx*100?>")/100;
	}
	}
	<? break;
    default:
	
	?>
	if (num2!=num3){
	document.all[bl].innerHTML= "<span  STYLE='background-color:ffff00;WIDTH: 100%;height:25px;vertical-align:middle;' ><span  STYle='display:inline-block;height:100%;vertical-align:middle;'></span><font color=ff0000><b>"+num2+"</b></font></span>";
	}else{
	document.all[bl].innerHTML= num2;}
	
<? break;
}?>

}

}
        } else {//http_request.status != 200
           
                alert("Request failed! ");
        }
    }
}



function sendCommand(commandName,pageURL,strPara)
{
	//功能：向pageURL页面发送数据，参数为strPara
	//并回传服务器返回的数据
	var oBao = new ActiveXObject("Microsoft.XMLHTTP");
	//特殊字符：+,%,&,=,?等的传输解决办法.字符串先用escape编码的.
	oBao.open("GET",pageURL+"?commandName="+commandName+"&"+strPara,false);
	oBao.send();
	//服务器端处理返回的是经过escape编码的字符串.
	var strResult = unescape(oBao.responseText);
	return strResult;
}

function beginrefresh(){
	 makeRequest('liuhecai.php?action=server&class1=特码&class2=<?=$ids?>');
}
</script>

<SCRIPT language=javascript>
 makeRequest('liuhecai.php?action=server&class1=特码&class2=<?=$ids?>');
 </script>
</body>
</html>