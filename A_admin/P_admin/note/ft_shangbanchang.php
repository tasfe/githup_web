<?php

include_once("../../include/config.php");
include_once("../common/login_check.php");
include_once("../../class/user.php");
include_once("common.php");
include_once("../../include/public_config.php");//$mysqli
include_once("../common/pager.class.php");

$date			=	date("m-d");
if($_GET['date']){
    $date		=	$_GET['date'];
}
$page_date		=	$date;

$sql			=	"SELECT Match_ID, Match_Date, Match_Time, Match_Master, Match_Guest, Match_Name, Match_IsLose, Match_MasterID, Match_GuestID, Match_Hr_ShowType, Match_Bmdy, Match_Bgdy, Match_Bhdy, Match_Bdpl, Match_Bxpl, Match_BRpk, Match_Bdxpk, Match_BHo, Match_BAo
FROM bet_match";

isset($_GET['match_type'])?$match_type=intval($_GET["match_type"]):$match_type=1;

if($match_type==1){   //单式
    $sqlwhere	=	" where Match_Type=1 and Match_Date='$date' and (Match_BHo+Match_BAo<>0 or Match_Bdpl+Match_Bxpl<>0) and Match_IsShowb=1";
}else if($match_type==0){ //早餐
    $sqlwhere	=	" where Match_CoverDate >'".date("Y-m-d H:i:s")."' and match_date!='".date("m-d")."' and (Match_BHo+Match_BAo<>0 or Match_Bdpl+Match_Bxpl<>0) and Match_IsShowb=1";
    if(isset($_GET["date"])){
       // $sqlwhere	=	" where Match_CoverDate >'".date("Y-m-d H:i:s")."' and match_date='$page_date' and (Match_BHo+Match_BAo<>0 or Match_Bdpl+Match_Bxpl<>0) and Match_IsShowb=1";
    }
}

$sql		.=	$sqlwhere;

$match_name	=	getmatch_name('bet_match',$sqlwhere);
if(isset($_GET["match_name"])) $sql.="  and match_name='".urldecode($_GET["match_name"])."'";

$sql.=" order by Match_CoverDate,ipage,isn";

$arr		=	array();
$arr_m		=	array();
$mid		=	'';
$query		=	$mysqli->query($sql);
//////////////////////////////////////
$sum    = $mysqli->affected_rows;//总页数
$thisPage = 1;
if(@$_GET['page']){
    $thisPage = $_GET['page'];
}
$pagenum=isset($_GET['page_num'])?$_GET['page_num']:20;

$totalPage=ceil($sum/$pagenum);

$CurrentPage=isset($_GET['page'])?$_GET['page']:1;
$mid    = '';
$i      = 1; //记录 uid 数
$start  = ($CurrentPage-1)*$pagenum+1;
$end  = $CurrentPage*$pagenum;
////////////////////////////////////////////////
while($rows = $query->fetch_array()){
    $arr[$rows["Match_ID"]]["Match_ID"]			=	$rows["Match_ID"]; //赛事id
    $arr[$rows["Match_ID"]]["Match_Date"]		=	$rows["Match_Date"];
    $arr[$rows["Match_ID"]]["Match_Time"]		=	$rows["Match_Time"];
    $arr[$rows["Match_ID"]]["Match_Master"]		=	$rows["Match_Master"];
    $arr[$rows["Match_ID"]]["Match_Guest"]		=	$rows["Match_Guest"];
    $arr[$rows["Match_ID"]]["Match_Name"]		=	$rows["Match_Name"];
    $arr[$rows["Match_ID"]]["Match_IsLose"]		=	$rows["Match_IsLose"];
    $arr[$rows["Match_ID"]]["Match_MasterID"]	=	$rows["Match_MasterID"];
    $arr[$rows["Match_ID"]]["Match_GuestID"]	=	$rows["Match_GuestID"];
    $arr[$rows["Match_ID"]]["Match_Hr_ShowType"]=	$rows["Match_Hr_ShowType"];
    $arr[$rows["Match_ID"]]["Match_Bmdy"]		=	$rows["Match_Bmdy"];
    $arr[$rows["Match_ID"]]["Match_Bgdy"]		=	$rows["Match_Bgdy"];
    $arr[$rows["Match_ID"]]["Match_Bhdy"]		=	$rows["Match_Bhdy"];
    $arr[$rows["Match_ID"]]["Match_Bdpl"]		=	$rows["Match_Bdpl"];
    $arr[$rows["Match_ID"]]["Match_Bxpl"]		=	$rows["Match_Bxpl"];
    $arr[$rows["Match_ID"]]["Match_BRpk"]		=	$rows["Match_BRpk"];
    $arr[$rows["Match_ID"]]["Match_Bdxpk"]		=	$rows["Match_Bdxpk"];
    $arr[$rows["Match_ID"]]["Match_BHo"]		=	$rows["Match_BHo"];
    $arr[$rows["Match_ID"]]["Match_BAo"]		=	$rows["Match_BAo"];
    $arr_m[$rows["Match_ID"]]					=	0;
    if($i >= $start && $i <= $end){
        $mid .= $rows["Match_ID"].',';
    }
    if($i > $end) break;
    $i++;
}
if($mid){
    $mid	=	rtrim($mid,",");
    $sql	=	"select match_id,point_column,bet_money from `k_bet` where match_type<2 and match_id in($mid) and `status`!=3 and `site_id`='".SITEID."'";
    $query	=	$mysqlt->query($sql);
    while($rows = $query->fetch_array()){
        $arr[$rows["match_id"]][$rows["point_column"]]['num']	=	$arr[$rows["match_id"]][$rows["point_column"]]['num']+1;
        $arr[$rows["match_id"]][$rows["point_column"]]['money']	=	$arr[$rows["match_id"]][$rows["point_column"]]['money']+$rows["bet_money"];
        $arr_m[$rows["match_id"]]								+=	$rows["bet_money"];
    }
}

arsort($arr_m);
require("../common_html/header.php");?>
    <style>
        .leg_type a:link,.leg_type a:visited{color: #000004; margin-left: 5px; border-bottom: #000000 solid 1px;}
    </style>
     <link rel="stylesheet" href="../images/control_main.css" type="text/css">
    <script language="javascript">
        function gopage(url){
            location.href=url;
        }
        function re_load(){
            location.reload();
        }
    </script>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" vlink="#0000FF" alink="#0000FF" >
<table width="100%" height="0" cellpadding="0" cellspacing="0" class="leg_type">
    <tr style="width:150px;">
        <td width="150">
            <div  class="input_002"><?
                if($_GET['match_type']==0) $mach_type_name='早餐';
                else  $mach_type_name='';
                if($_GET['MacthType'] ){
                    $macth_name_=$_GET['MacthType'];
                 echo      $macth_name= $_GET['MacthType'].'-上半场';
                }
                else{
                    $macth_name_="足球$mach_type_name";
                    echo $macth_name="足球$mach_type_name-上半场";
                }
                ?></div>
        </td>
        <td width="250">
            &nbsp; &nbsp;赛事选择：
            <select id="select" name="table" onChange="gopage(this.value);" class="za_select">
                <?= '<option value="'.$_SERVER['PHP_SELF'].'?match_type='.$_GET['match_type'].'&MacthType='.$_GET['MacthType'].'">'.$macth_name_.'</option> ';  ?>
                <option value="ft_danshi.php?match_type=1&MacthType=足球">足球</option>
                <option value="ft_danshi.php?match_type=0&MacthType=足球早餐">足球早餐</option>
                <option value="bk_danshi.php?match_type=1&MacthType=篮球">篮球</option>
                <option value="bk_danshi.php?match_type=0&MacthType=篮球早餐">篮球早餐</option>
                <option value="tennis_danshi.php?match_type=1&MacthType=网球">网球</option>
                <option value="tennis_danshi.php?match_type=0&MacthType=网球早餐">网球早餐</option>
                <option value="volleyball_danshi.php?match_type=1&MacthType=排球">排球</option>
                <option value="volleyball_danshi.php?match_type=0&MacthType=排球早餐">排球早餐</option>
                <option value="baseball_danshi.php?match_type=1&MacthType=棒球">棒球</option>
                <option value="baseball_danshi.php?match_type=0&MacthType=棒球早餐">棒球早餐</option>
                <option value="guanjun.php?match_type=1&MacthType=冠軍">冠軍</option>
            </select></td>
        <td  width="300">
            頁數：
            <select id="page" name="page" class="za_select" onchange="gopage(this.value);">
                <?php
                if(isset($_GET["match_name"])) $match_name_url="match_name=".urlencode(@$v)."&";
                else $match_name_url='';
                for($i=1;$i<=$totalPage;$i++){

                    $pageurl=$_SERVER['PHP_SELF']."?{$match_name_url}match_type=$match_type&page=$i";
                    if($i==$CurrentPage){
                        echo  "<option   value='$pageurl' selected> $i </option>";
                    }else{
                        echo  "<option value='$pageurl'>$i</option>";
                    }
                }

                if($totalPage==0){
                    $pageurl=$_SERVER['PHP_SELF']."?{$match_name_url}match_type=$match_type&page=$i";
                    echo  "<option   value='$pageurl' selected> $i </option>";
                }

                ?>
            </select> <?php echo  $totalPage ;?> 頁&nbsp;
            <script>
                var i=<?=intval($_GET['time'])?>;
                var cleartime=true;
                if(i==''){
                    var i=0;
                }
                $(document).ready(function(){


                    if(i!=0){
                        setInterval("timeout(i)",1000);
                    }

                });
                function timeout(time){
                    i = time;
                    var reload=i;
                    clearInterval(cleartime);
                    if(i!=-1){
                        cleartime =	setInterval("refresh()",1000);
                    }
                }
                function refresh(){
                    //alert(i)
                    if(i <=0){
                        var reload=$("#retime").val();
                        var jump_url=$("#page").val()+'&time='+reload;
                        window.location.href=jump_url;//调转
                    }else{
                        $('#time').html(i);
                        i--;
                    }
                }
            </script>
            重新整理:
            <select  id="retime"  name="retime"   class="za_select"  onchange="timeout(this.value);">

                <option  value="-1"  selected="">不更新</option>
                <option value="5" <?if($_GET['time']==5){ echo 'selected="select"';}?>>5秒</option>
                <option value="10" <?if($_GET['time']==10){ echo 'selected="select"';}?>>10秒</option>
                <option value="15" <?if($_GET['time']==15){ echo 'selected="select"';}?>>15秒</option>
                <option value="30" <?if($_GET['time']==30){ echo 'selected="select"';}?>>30秒</option>
                <option value="60" <?if($_GET['time']==60){ echo 'selected="select"';}?>>60秒</option>
                <option value="120" <?if($_GET['time']==120){ echo 'selected="select"';}?>>120秒</option>
            </select>&nbsp;&nbsp;<span id="time"></span>


        </td>
        <td width="262" align="left">&nbsp;&nbsp;选择联盟&nbsp;
            <select id="set_account" name="match_name" onChange="gopage(this.value);" class="za_select">
                <option value="<?=$_SERVER['PHP_SELF']?>?match_type=<?=$match_type?>&amp;date=<?=$page_date?>">==选择联盟==</option>
                <?php
                foreach ($match_name as $k=>$v){?>
                    <option <? if(urldecode(@$_GET["match_name"])==$v){?> selected="selected" <? }?> value="<?=$_SERVER['PHP_SELF']?>?match_name=<?=urlencode(@$v)?>&amp;match_type=<?=$match_type?>&amp;date=<?=$page_date?>"><?=$v?></option>
                <?php }?>
            </select>	</td>
        <td width="435" class="leg_type"><A  href="ft_danshi.php?match_type=<?=$match_type?>">單式</A>&nbsp;&nbsp;<?php if($match_type==1){?> <A href="ft_gunqiu.php">滾球</A><?}?>&nbsp;&nbsp;<a  href="ft_shangbanchang.php?match_type=<?=$match_type?>">上半場</a>&nbsp;&nbsp;<A href="ft_shangbanbodan.php?match_type=<?=$match_type?>">上半波膽</A>&nbsp;&nbsp;<span id="pg_txt"><a href="ft_bodan.php?match_type=<?=$match_type?>">波膽</a>&nbsp;&nbsp;<A href="ft_ruqiushu.php?match_type=<?=$match_type?>">入球数</A>&nbsp;&nbsp;<A  href="ft_banquanchang.php?match_type=<?=$match_type?>">半全場</A><? if($match_type==1){?>&nbsp;&nbsp;<A  href="ft_yks.php">已开赛</A><?}?></span></td>
    </tr>
</table>
<table width="888" border="0" cellpadding="0" cellspacing="1"  bgcolor="006255" class="m_tab" id="glist_table">
    <tr class="m_title">
        <td width="60" ><strong>時間</strong></td>
        <td nowrap="nowrap" width="160"><strong>聯盟</strong></td>
        <td width="50"><strong>場次</strong></td>
        <td width="170"><strong>隊伍</strong></td>
        <td width="160"><strong>讓球 / 注單</strong></td>
        <td width="160"><strong>大小盤 / 注單</strong></td>
        <td width="120"><strong>獨贏</strong></td>
    </tr>
    <?php
    foreach($arr_m as $k=>$v){
        $rows	=	$arr[$k];
        $color	=	getColor($v);
        ?>
        <tr bgcolor="<?=$color?>" onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='<?=$color?>'">
            <td align="center"><?=$rows["Match_Date"]?><br />
                <?=$rows["Match_Time"]?><br />
                <? if(@$rows["Match_IsLose"]==1){?>  <span style="color:#FF0000">滾球</span><? } ?></td>
            <td><?=$rows["Match_ID"]?><br /><?=$rows["Match_Name"]?></td>
            <td><?=$rows["Match_MasterID"]?><br><?=$rows["Match_GuestID"]?></td>
            <td align="left"><?=$rows["Match_Master"]?>-[上半]<br><?=$rows["Match_Guest"]?>-[上半]
                <div style=" color:#009933">和局</div></td>
            <td><table cellspacing="0" cellpadding="0" width="100%" border="0">
                    <tbody>
                    <tr align="right">
                        <td width="50%"><? if($rows["Match_Hr_ShowType"]=="H"){?>  <font color="#0033FF"><?=$rows["Match_BRpk"]?> </font> <?}?>
                            <? if($rows["Match_BHo"]>0) echo double_format($rows["Match_BHo"]);?></font>              </td>
                        <td width="50%"><a href="list.php?match_id=<?=$rows["Match_ID"]?>&point_column=Match_BHo" <?=getAC($arr[$rows["Match_ID"]]["match_bho"]['num'])?> ><?=getString($arr[$rows["Match_ID"]]["match_bho"]['num'])?>/<?=getString($arr[$rows["Match_ID"]]["match_bho"]['money'])?></a></td>
                    </tr>
                    <tr align="right">
                        <td><? if($rows["Match_Hr_ShowType"]=="C"){?>  <font color="#0033FF"><?=$rows["Match_BRpk"]?> </font> <?}?>
                            <? if($rows["Match_BAo"]>0) echo double_format($rows["Match_BAo"]);?>             </td>
                        <td><a href="list.php?match_id=<?=$rows["Match_ID"]?>&point_column=match_bao" <?=getAC($arr[$rows["Match_ID"]]["match_bao"]['num'])?> ><?=getString($arr[$rows["Match_ID"]]["match_bao"]['num'])?>/<?=getString($arr[$rows["Match_ID"]]["match_bao"]['money'])?></a></td>
                    </tr>
                    <tr>
                        <td colspan="2"> </td>
                    </tr>
                    </tbody>
                </table></td>
            <td><table cellspacing="0" cellpadding="0" width="100%" border="0">
                    <tbody>
                    <tr align="right">
                        <td width="50%"><? if ($rows["Match_Bdxpk"]>0){?>   <font color="#0033FF"><?="O".$rows["Match_Bdxpk"]?> </font><?}?>
                            <? if($rows["Match_Bdpl"]>0) echo double_format($rows["Match_Bdpl"]);?>              </td>
                        <td width="50%"><a href="list.php?match_id=<?=$rows["Match_ID"]?>&point_column=Match_Bdpl" <?=getAC($arr[$rows["Match_ID"]]["match_bdpl"]['num'])?> ><?=getString($arr[$rows["Match_ID"]]["match_bdpl"]['num'])?>/<?=getString($arr[$rows["Match_ID"]]["match_bdpl"]['money'])?></a> </td>
                    </tr>
                    <tr align="right">
                        <td>  <? if ($rows["Match_Bdxpk"]>0){?>   <font color="#0033FF"><?="U".$rows["Match_Bdxpk"]?> </font><?}?>  <? if($rows["Match_Bxpl"]>0) echo double_format($rows["Match_Bxpl"]);?>     <br />              </td>
                        <td><a href="list.php?match_id=<?=$rows["Match_ID"]?>&point_column=Match_Bxpl" <?=getAC($arr[$rows["Match_ID"]]["match_bxpl"]['num'])?> ><?=getString($arr[$rows["Match_ID"]]["match_bxpl"]['num'])?>/<?=getString($arr[$rows["Match_ID"]]["match_bxpl"]['money'])?></a> </td>
                    </tr>
                    <tr>
                        <td colspan="3"> </td>
                    </tr>
                    </tbody>
                </table></td>
            <td><table cellspacing="0" cellpadding="0" width="100%" border="0">
                    <tbody>
                    <tr align="right">
                        <td align="right" width="33%">
                            <? if($rows["Match_Bmdy"]>0) echo double_format($rows["Match_Bmdy"]);?>
                            <br /></td>
                        <td width="67%"><a href="list.php?match_id=<?=$rows["Match_ID"]?>&point_column=Match_Bmdy" <?=getAC($arr[$rows["Match_ID"]]["match_bmdy"]['num'])?> ><?=getString($arr[$rows["Match_ID"]]["match_bmdy"]['num'])?>/<?=getString($arr[$rows["Match_ID"]]["match_bmdy"]['money'])?></a></td>
                    </tr>
                    <tr align="right">
                        <td align="right"><? if($rows["Match_Bgdy"]>0) echo double_format($rows["Match_Bgdy"]);?>                <br /></td>
                        <td><a href="list.php?match_id=<?=$rows["Match_ID"]?>&point_column=Match_Bgdy" <?=getAC($arr[$rows["Match_ID"]]["match_bgdy"]['num'])?> ><?=getString($arr[$rows["Match_ID"]]["match_bgdy"]['num'])?>/<?=getString($arr[$rows["Match_ID"]]["match_bgdy"]['money'])?></a></td>
                    </tr>
                    <tr align="right">
                        <td align="right"> <? if($rows["Match_Bhdy"]>0) echo double_format($rows["Match_Bhdy"]);?><br /></td>
                        <td><a href="list.php?match_id=<?=$rows["Match_ID"]?>&point_column=Match_Bhdy" <?=getAC($arr[$rows["Match_ID"]]["match_bhdy"]['num'])?> ><?=getString($arr[$rows["Match_ID"]]["match_bhdy"]['num'])?>/<?=getString($arr[$rows["Match_ID"]]["match_bhdy"]['money'])?></a> </td>
                    </tr>
                    </tbody>
                </table></td>
        </tr>
    <? }?>
</table>
<?php require("../common_html/footer.php");?>