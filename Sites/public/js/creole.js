//数詞配列
var names = new Array('.one','.two','.three','.four','.five','.six','.seven','.eight','.nine','.ten');
/**
 * setParam()
 * 軌道パラメータセット設定関数
 * @param orbit {string} 内回りか外回りか
 */
function setParam(orbit){
	var par;
	if(orbit == '.internal'){
		par = {
		interval: 1000,
		radius: 250,
		angle: 2
		};
	}else if(orbit == '.external'){
		par = {
		interval: 2000,
		radius: 500,
		angle: 4
		};
	}
	return par;
}
/**
 * calcPosition()
 * X座標Y座標設定関数
 * @param par {assoiative Array} 軌道パラメータセット
 * @param n {int} 何個目の惑星か 
 * @param max {int} 同じ軌道にいる惑星の数
 * @param x {int} 軌道のx座標
 * @param y {int} 軌道のy座標
 * @return pos {associative Array} 惑星の座標
 */
function calcPosition(par,theta,n,max,x,y){
	var pos = {
			left: (x + 460 + $('.galaxy').offset().left + RadiusToDescartes(Math.cos,par,theta,n,max)) + 'px',
			top: (y + 450 + $('.galaxy').offset().top + RadiusToDescartes(Math.sin,par,theta,n,max)) + 'px'
	};
	return pos;　
}
/**
 * RadiusToDescartes()
 * 角度と半径(極座標)からX,Y座標(デカルト座標)への変換関数
 * @param func {functio Object} Mathクラス内の関数
 * @param par {associative Array} 軌道パラメータセット
 * @param theta {int} 角度 
 * @param n {int} 何個目の惑星か 
 * @param max {int} 同じ軌道にいる惑星の数
 * @return 
 */
function RadiusToDescartes(func,par,theta,n,max){
	//まず、惑星を正N角形にしたいので360の何分の何か求める
	var cornerRatio = n / max;
	//1周(360度)のラジアンを求める
	var round = 2 * Math.PI;
	//次に、現在の角度を全体1周をインタバルパラメータからとってくる
	var intervalRatio = theta / par.interval;
	//半径×三角関数(割合x360度)
	var ans = par.radius*func((intervalRatio + cornerRatio)* round);
	return ans;
}
/**
 * rotate()
 * 惑星回転関数
 * @param galaxy {string} 何個目の太陽系か{整数クラス}
 * @param orbit {string} 内回りか外回りか
 * @param name {string} 何個目の惑星か{整数クラス}
 * @param n {int} 何個目の惑星か 
 * @param max {int} 同じ軌道にいる惑星の数
 * @param x {int} 軌道のx座標
 * @param y {int} 軌道のy座標
 */
function rotate(galaxy,orbit,name,n,max,x,y){
	var par,
	theta = 0,
	loop = 0;
	par = setParam(orbit);
	setInterval(function(){
		$(galaxy +' .orbit ' + orbit +' '+ name +' .planet').css(calcPosition(par,theta,n,max,x,y));
		if(loop++ > max){
			if(++theta > par.interval * par.angle){
				theta = 0;
			}
			loop = 0;
		}
	},1);
}
/**
 * constellation()
 * 星座描画関数
 */
function constellation(){
	$('.planet').click(function(){
		$(this).css('background-color','red');
	});
	$('.planet').dblclick(function(){
		$(this).css('background-color','white');
	});
}
/**
 * makeInternalSolarSystem()
 * 内回転太陽系構成関数
 * @param galaxy {int} 何個目の太陽系か
 * @param num {int} 同じ軌道にいる惑星の数
 * @param x {int} 軌道のx座標
 * @param y {int} 軌道のy座標
 */
function makeInternalSolarSystem(galaxy,num,x,y){
	for(i = 0;i < num;i++){
		rotate(names[galaxy],'.internal',names[i],i,num,x,y);
	}
}
/**
 * makeExternalSolarSystem()
 * 外回転太陽系構成関数
 * @param galaxy {int} 何個目の太陽系か
 * @param num {int} 同じ軌道にいる惑星の数
 * @param x {int} 軌道のx座標
 * @param y {int} 軌道のy座標
 */
function makeExternalSolarSystem(galaxy,num,x,y){
	for(i = 0;i < num;i++){
		rotate(names[galaxy],'.external',names[i],i,num,x,y);
	}
}
/**
 * main()
 * メイン関数
 * @task ギャラクシークラスをドラッグで動かせるようにする
 * @task コンステレーション機能を起動
 */
$(function main(){
	jQuery('.galaxy') . draggable();
	constellation();
});