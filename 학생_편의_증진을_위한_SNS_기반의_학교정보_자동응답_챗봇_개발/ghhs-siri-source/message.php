<?php
use Cmfcmf\OpenWeatherMap;

$data = json_decode(file_get_contents('php://input'),true);
$content = $data["content"];

// include 처음으로, 처음
if(strpos($content, "처음") !== false){
echo <<< EOD
    {
        "message": {
            "text": "메인 메뉴로 돌아갑니다."
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
            ]
        }
    }
EOD;
}

// include 시작하기, 시작
elseif(strpos($content, "실험실") !== false){
echo <<< EOD
    {
        "message": {
            "text": "현재는 실험중인 기능이 없습니다!"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
            ]
        }
    }
EOD;
}

// include 시간표
elseif(strpos($content, "시간표") !== false){
echo <<< EOD
    {
        "message": {
            "text": "학년을 선택해주세요"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "1학년",
                "2학년",
                "3학년",
                "처음으로"
            ]
        }
    }
EOD;
}

// include 1학년
elseif($content == "1학년"){
echo <<< EOD
    {
        "message": {
            "text": "반을 선택해주세요"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "1학년 1반",
                "1학년 2반",
                "1학년 3반",
                "1학년 4반",
                "1학년 5반",
                "1학년 6반",
                "1학년 7반",
                "1학년 8반",
                "1학년 9반",
                "1학년 10반",
                "처음으로"
            ]
        }
    }
EOD;
}

// include 2학년
elseif($content == "2학년"){
echo <<< EOD
    {
        "message": {
            "text": "반을 선택해주세요"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "2학년 1반",
                "2학년 2반",
                "2학년 3반",
                "2학년 4반",
                "2학년 5반",
                "2학년 6반",
                "2학년 7반",
                "2학년 8반",
                "2학년 9반",
                "2학년 10반",
                "처음으로"
            ]
        }
    }
EOD;
}

// include 2학년
elseif($content == "2학년 6반"){
    $url_206 = 'http://juneyoung.kr/api/ghhs-siri-kakao/timetable/206.txt';
    $tt_206=file_get_contents($url_206);
echo <<< EOD
    {
        "message": {
            "text": "$tt_206"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
            ]
        }
    }
EOD;
}

// include 3학년
elseif($content == "3학년"){
echo <<< EOD
    {
        "message": {
            "text": "반을 선택해주세요"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "3학년 1반",
                "3학년 2반",
                "3학년 3반",
                "3학년 4반",
                "3학년 5반",
                "3학년 6반",
                "3학년 7반",
                "3학년 8반",
                "3학년 9반",
                "3학년 10반",
                "처음으로"
            ]
        }
    }
EOD;
}

// include 시작하기, 시작
elseif(strpos($content, "도움말") !== false){
echo <<< EOD
    {
        "message": {
            "text": "교하고등학교 학생 여러분 안녕하세요.\\n저는 교하고등학교 챗봇, GHHS Siri입니다.\\n저와 함께 이런 것들을 할 수 있어요.\\n\\n1. [급식] : 오늘, 내일, 이번주 급식\\n2. [날씨] : 현재 기온, 미세먼지 정보\\n3. [시간표] : 학급별 시간표\\n4. [학사일정] : 이번 달, 다음 달, 이번 해 학사일정\\n5. [버스] : 학교 주변 버스도착정보\\n6. [자유대화] : 챗봇과 자유로운 대화\\n7. [개발자] : GHHS Siri 개발자 정보\\n8. [후원] : 개발자에게 후원\\n9. [도움말] : 도움말 확인\\n10. [실험실] : 새로운 기능의 베타버전 테스트\\n\\n개발자 : 교하고등학교 2학년 6반 강준영"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
            ]
        }
    }
EOD;
}

// include 급식 exclude 오늘 & 내일
if($content=="급식"){
echo <<< EOD
    {
        "message": {
            "text": "급식 정보를 선택해주세요."
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
              "오늘 급식",
              "내일 급식", 
              "처음으로"
            ]
        }
    }
EOD;
}

// include 급식 & 오늘 exclude 내일
else if( strpos($content, "오늘 급식") !== false){
    $url = 'http://juneyoung.kr/api/school-meal/meal_api.php?countryCode=stu.goe.go.kr&schulCode=J100004922&insttNm=교하고등학교&schulCrseScCode=4&schMmealScCode=2';
    $json=file_get_contents($url);
    $result=json_decode($json, true);
    $final=$result['메뉴'];
    $final=str_replace("(교하)", "\\n", $final);
    $time = time();
    $date = date("m월 d일");
echo <<< EOD
    {
        "message": {
            "text": "[$date 급식]\\n\\n$final"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
            ]
        }
    }
EOD;
}

// include 급식 & 내일 exclude 오늘
else if( strpos($content, "내일 급식") !== false){
    $url_tom = 'http://juneyoung.kr/api/school-meal/meal_api_tomorrow_new.php?countryCode=stu.goe.go.kr&schulCode=J100004922&insttNm=교하고등학교&schulCrseScCode=4&schMmealScCode=2';
    $json_tom=file_get_contents($url_tom);
    $result_tom=json_decode($json_tom, true);
    $final_tom=$result_tom['메뉴'];
    $final_tom=str_replace("(교하)", "\\n", $final_tom);
    $time_tom = time();
    $date_tom = date("m월 d일", strtotime("+24 hours", $time_tom));
echo <<< EOD
    {
        "message": {
            "text": "[$date_tom 급식]\\n\\n$final_tom"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    }
EOD;
}

// include 날씨
else if(strpos($content, "날씨") !== false){
echo <<< EOD
    {
        "message": {
            "text": "어떤 정보가 필요한가요?"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
              "기온",
              "미세먼지",
              "처음으로"
            ]
        }
    }
EOD;
}

// include 기온
else if(strpos($content, "기온") !== false){
    require 'vendor/autoload.php';
    $lang = 'ko';
    $units = 'metric';
    $owm = new OpenWeatherMap('8677921cc13beec7e1d9189f12e02993');
    $weather = $owm->getWeather('Seoul', $units, $lang);
    $weather_final=$weather->temperature;
    $weather_final=str_replace("&deg;C", "°C", $weather_final);
echo <<< EOD
    {
        "message": {
            "text": "현재 기온은 $weather_final 입니다."
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    }
EOD;
}

// include 미세먼지
else if(strpos($content, "미세먼지") !== false){
    $url_khai = 'http://juneyoung.kr/api/ghhs-siri-kakao/mise_api.php?numOfRows=10&pageSize=10&pageNo=1&startPage=1&stationName=파주&dataTerm=DAILY&ver=1.3';
    $khai=file_get_contents($url_khai);
    $url_pm10 = 'http://juneyoung.kr/api/ghhs-siri-kakao/mise10_api.php?numOfRows=10&pageSize=10&pageNo=1&startPage=1&stationName=파주&dataTerm=DAILY&ver=1.3';
    $pm10=file_get_contents($url_pm10);
    $url_pm25 = 'http://juneyoung.kr/api/ghhs-siri-kakao/mise25_api.php?numOfRows=10&pageSize=10&pageNo=1&startPage=1&stationName=파주&dataTerm=DAILY&ver=1.3';
    $pm25=file_get_contents($url_pm25);
echo <<< EOD
    {
        "message": {
            "text": "현재 대기환경 정보입니다.\\n\\n통합대기환경 : $khai\\nPM10(미세먼지) : $pm10\\nPM2.5(초미세먼지) : $pm25"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    }
EOD;
}

// 학사일정
elseif(strpos($content, "학사일정") !== false){
echo <<< EOD
    {
        "message": {
            "text": "원하는 일정을 선택해주세요."
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "이번 달 일정",
                "다음 달 일정",
                "이번 해 일정",
                "처음으로"
            ]
        }
    }
EOD;
}

// 학사일정
elseif(strpos($content, "이번 달 일정") !== false){
    $month_this = date("n");
    $this_month_url = "http://juneyoung.kr/api/ghhs-siri-kakao/plan/month" . $month_this . ".txt";
    $this_month = file_get_contents($this_month_url);
echo <<< EOD
    {
        "message": {
            "text": "$this_month"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    }
EOD;
}

// 학사일정
elseif(strpos($content, "다음 달 일정") !== false){
    $time_time = time();
    $month_next = date("n", strtotime("+1 months", $time_time));
    $next_month_url = "http://juneyoung.kr/api/ghhs-siri-kakao/plan/month" . $month_next . ".txt";
    $next_month = file_get_contents($next_month_url);
echo <<< EOD
    {
        "message": {
            "text": "$next_month"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    }
EOD;
}

// 학사일정
elseif(strpos($content, "이번 해 일정") !== false){
    $whole_month_url = "http://juneyoung.kr/api/ghhs-siri-kakao/plan/wholemonth.txt";
    $whole_month = file_get_contents($whole_month_url);
echo <<< EOD
    {
        "message": {
            "text": "$whole_month"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    }
EOD;
}

// 버스
else if(strpos($content, "버스") !== false){
echo <<< EOD
    {
        "message": {
            "text": "조회하고자 하는 정류장을 선택해주세요."
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "숲속길마을7단지",
                "트리플메디컬타운",
                "교하중앙공원",
                "책향기마을10/11단지",
                "처음으로"
              ]
        }

    }
EOD;
}

// 트리플메디컬타운
else if(strpos($content, "트리플메디컬타운") !== false){
echo <<< EOD
    {
        "message": {
            "text": "버스 번호를 선택해주세요."
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "1500번 - 30843",
                "200번 - 30843",
                "5600번 - 30843",
                "66번 - 30843",
                "70번 - 30843",
                "77-1번 - 30843",
                "77-2번 - 30843",
                "77-3번 - 30843",
                "77-2번 - 30843",
                "80번 - 30843",
                "9030번 - 30843",
                "9030-1번 - 30843",
                "처음으로"
            ]
        }
    
    }
EOD;
}

// 트리플메디컬타운 - 1500
else if(strpos($content, "1500") !== false && strpos($content, "30843") !== false){
    $url_tm_1500="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=tm&route=1500";
    $bus_tm_1500=file_get_contents($url_tm_1500);
echo <<< EOD
    {
        "message": {
            "text": "$bus_tm_1500"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 트리플메디컬타운 - 200
else if(strpos($content, "200") !== false && strpos($content, "30843") !== false){
    $url_tm_200="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=tm&route=200";
    $bus_tm_200=file_get_contents($url_tm_200);
echo <<< EOD
    {
        "message": {
            "text": "$bus_tm_200"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 트리플메디컬타운 - 5600
else if(strpos($content, "5600") !== false && strpos($content, "30843") !== false){
    $url_tm_5600="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=tm&route=5600";
    $bus_tm_5600=file_get_contents($url_tm_5600);
echo <<< EOD
    {
        "message": {
            "text": "$bus_tm_5600"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 트리플메디컬타운 - 66
else if(strpos($content, "66") !== false && strpos($content, "30843") !== false){
    $url_tm_66="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=tm&route=66";
    $bus_tm_66=file_get_contents($url_tm_66);
echo <<< EOD
    {
        "message": {
            "text": "$bus_tm_66"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 트리플메디컬타운 - 70
else if(strpos($content, "70") !== false && strpos($content, "30843") !== false){
    $url_tm_70="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=tm&route=70";
    $bus_tm_70=file_get_contents($url_tm_70);
echo <<< EOD
    {
        "message": {
            "text": "$bus_tm_70"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 트리플메디컬타운 - 77-1
else if(strpos($content, "77-1") !== false && strpos($content, "30843") !== false){
    $url_tm_77_1="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=tm&route=77_1";
    $bus_tm_77_1=file_get_contents($url_tm_77_1);
echo <<< EOD
    {
        "message": {
            "text": "$bus_tm_77_1"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 트리플메디컬타운 - 77-2
else if(strpos($content, "77-2") !== false && strpos($content, "30843") !== false){
    $url_tm_77_2="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=tm&route=77_2";
    $bus_tm_77_2=file_get_contents($url_tm_77_2);
echo <<< EOD
    {
        "message": {
            "text": "$bus_tm_77_2"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 트리플메디컬타운 - 77-3
else if(strpos($content, "77-3") !== false && strpos($content, "30843") !== false){
    $url_tm_77_3="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=tm&route=77_3";
    $bus_tm_77_3=file_get_contents($url_tm_77_3);
echo <<< EOD
    {
        "message": {
            "text": "$bus_tm_77_3"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 트리플메디컬타운 - 80
else if(strpos($content, "80") !== false && strpos($content, "30843") !== false){
    $url_tm_80="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=tm&route=80";
    $bus_tm_80=file_get_contents($url_tm_80);
echo <<< EOD
    {
        "message": {
            "text": "$bus_tm_80"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 트리플메디컬타운 - 9030
else if(strpos($content, "9030") !== false && strpos($content, "30843") !== false){
    $url_tm_9030="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=tm&route=9030";
    $bus_tm_9030=file_get_contents($url_tm_9030);
echo <<< EOD
    {
        "message": {
            "text": "$bus_tm_9030"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 트리플메디컬타운 - 9030-1
else if(strpos($content, "9030-1") !== false && strpos($content, "30843") !== false){
    $url_tm_9030_1="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=tm&route=9030_1";
    $bus_tm_9030_1=file_get_contents($url_tm_9030_1);
echo <<< EOD
    {
        "message": {
            "text": "$bus_tm_9030_1"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 숲속길마을 7단지
else if(strpos($content, "숲속길마을7단지") !== false){
echo <<< EOD
    {
        "message": {
            "text": "버스 번호를 선택해주세요."
       },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "1500번 - 30646",
                "200번 - 30646",
                "5600번 - 30646",
                "66번 - 30646",
                "70번 - 30646",
                "77-1번 - 30646",
                "77-2번 - 30646",
                "77-3번 - 30646",
                "77-2번 - 30646",
                "80번 - 30646",
                "9030번 - 30646",
                "9030-1번 - 30646",
                "처음으로"
            ]
        }
        
    }
EOD;
}

// 숲속길마을 7단지 - 1500
else if(strpos($content, "1500") !== false && strpos($content, "30646") !== false){
    $url_sm_1500="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=sm&route=1500";
    $bus_sm_1500=file_get_contents($url_sm_1500);
echo <<< EOD
    {
        "message": {
            "text": "$bus_sm_1500"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 숲속길마을 7단지 - 200
else if(strpos($content, "200") !== false && strpos($content, "30646") !== false){
    $url_sm_200="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=sm&route=200";
    $bus_sm_200=file_get_contents($url_sm_200);
echo <<< EOD
    {
        "message": {
            "text": "$bus_sm_200"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 숲속길마을 7단지 - 5600
else if(strpos($content, "5600") !== false && strpos($content, "30646") !== false){
    $url_sm_5600="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=sm&route=5600";
    $bus_sm_5600=file_get_contents($url_sm_5600);
echo <<< EOD
    {
        "message": {
            "text": "$bus_sm_5600"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 숲속길마을 7단지 - 66
else if(strpos($content, "66") !== false && strpos($content, "30646") !== false){
    $url_sm_66="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=sm&route=66";
    $bus_sm_66=file_get_contents($url_sm_66);
echo <<< EOD
    {
        "message": {
            "text": "$bus_sm_66"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 숲속길마을 7단지 - 70
else if(strpos($content, "70") !== false && strpos($content, "30646") !== false){
    $url_sm_70="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=sm&route=70";
    $bus_sm_70=file_get_contents($url_sm_70);
echo <<< EOD
    {
        "message": {
            "text": "$bus_sm_70"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 숲속길마을 7단지 - 77-1
else if(strpos($content, "77-1") !== false && strpos($content, "30646") !== false){
    $url_sm_77_1="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=sm&route=77_1";
    $bus_sm_77_1=file_get_contents($url_sm_77_1);
echo <<< EOD
    {
        "message": {
            "text": "$bus_sm_77_1"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 숲속길마을 7단지 - 77-2
else if(strpos($content, "77-2") !== false && strpos($content, "30646") !== false){
    $url_sm_77_2="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=sm&route=77_2";
    $bus_sm_77_2=file_get_contents($url_sm_77_2);
echo <<< EOD
    {
        "message": {
            "text": "$bus_sm_77_2"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 숲속길마을 7단지 - 77-3
else if(strpos($content, "77-3") !== false && strpos($content, "30646") !== false){
    $url_sm_77_3="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=sm&route=77_3";
    $bus_sm_77_3=file_get_contents($url_sm_77_3);
echo <<< EOD
    {
        "message": {
            "text": "$bus_sm_77_3"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 숲속길마을 7단지 - 80
else if(strpos($content, "80") !== false && strpos($content, "30646") !== false){
    $url_sm_80="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=sm&route=80";
    $bus_sm_80=file_get_contents($url_sm_80);
echo <<< EOD
    {
        "message": {
            "text": "$bus_sm_80"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 숲속길마을 7단지 - 9030
else if(strpos($content, "9030") !== false && strpos($content, "30646") !== false){
    $url_sm_9030="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=sm&route=9030";
    $bus_sm_9030=file_get_contents($url_sm_9030);
echo <<< EOD
    {
        "message": {
            "text": "$bus_sm_9030"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 숲속길마을 7단지 - 9030-1
else if(strpos($content, "9030-1") !== false && strpos($content, "30646") !== false){
    $url_sm_9030_1="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=sm&route=9030_1";
    $bus_sm_9030_1=file_get_contents($url_sm_9030_1);
echo <<< EOD
    {
        "message": {
            "text": "$bus_sm_9030_1"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 교하중앙공원
else if(strpos($content, "교하중앙공원") !== false){
echo <<< EOD
    {
        "message": {
            "text": "정류소의 방면을 선택해주세요."
       },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "교하/금촌/파주 방면 30842(준비중)",
                "일산/고양/덕이 방면 30666(준비중)",
                "처음으로"
            ]
        }
        
    }
EOD;
}

// 교하중앙공원
else if(strpos($content, "교하/금촌/파주 방면 30842") !== false){
echo <<< EOD
    {
        "message": {
            "text": "버스 번호를 선택해주세요."
       },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "200번 - 30842",
                "70번 - 30842",
                "77-1번 - 30842",
                "처음으로"
            ]
        }
EOD;
}

// 교하중앙공원 - 200
else if(strpos($content, "200") !== false && strpos($content, "30842") !== false){
    $url_cpp_200="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=cpp&route=200";
    $bus_cpp_200=file_get_contents($url_cpp_200);
echo <<< EOD
    {
        "message": {
            "text": "$bus_cpp_200"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 교하중앙공원 - 70
else if(strpos($content, "70") !== false && strpos($content, "30842") !== false){
    $url_cpp_70="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=cpp&route=70";
    $bus_cpp_70=file_get_contents($url_cpp_70);
echo <<< EOD
    {
        "message": {
            "text": "$bus_cpp_70"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 교하중앙공원 - 77-1
else if(strpos($content, "77-1") !== false && strpos($content, "30842") !== false){
    $url_cpp_77_1="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=cpp&route=77_1";
    $bus_cpp_77_1=file_get_contents($url_cpp_77_1);
echo <<< EOD
    {
        "message": {
            "text": "$bus_cpp_77_1"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 교하중앙공원
else if(strpos($content, "30666") !== false  && strpos($content, "방면") !== false){
echo <<< EOD
    {
        "message": {
            "text": "버스 번호를 선택해주세요."
       },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "200번 - 30666",
                "70번 - 30666",
                "77-1번 - 30666",
                "처음으로"
            ]
        }
EOD;
}

// 교하중앙공원 - 200
else if(strpos($content, "200") !== false && strpos($content, "30666") !== false){
    $url_cpi_200="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=cpi&route=200";
    $bus_cpi_200=file_get_contents($url_cpi_200);
echo <<< EOD
    {
        "message": {
            "text": "$bus_cpi_200"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 교하중앙공원 - 70
else if(strpos($content, "70") !== false && strpos($content, "30666") !== false){
    $url_cpi_70="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=cpi&route=70";
    $bus_cpi_70=file_get_contents($url_cpi_70);
echo <<< EOD
    {
        "message": {
            "text": "$bus_cpi_70"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 교하중앙공원 - 77-1
else if(strpos($content, "77-1") !== false && strpos($content, "30666") !== false){
    $url_cpi_77_1="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=cpi&route=77_1";
    $bus_cpi_77_1=file_get_contents($url_cpi_77_1);
echo <<< EOD
    {
        "message": {
            "text": "$bus_cpi_77_1"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 책향기마을10/11단지
else if(strpos($content, "책향기마을10/11단지") !== false){
echo <<< EOD
    {
        "message": {
            "text": "정류소의 방면을 선택해주세요."
       },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "운정 방면 50002(준비중)",
                "교하 방면 50003(준비중)",
                "처음으로"
            ]
        }
        
    }
EOD;
}

// 책향기마을10/11단지
else if(strpos($content, "50002") !== false && strpos($content, "운정") !== false){
echo <<< EOD
    {
        "message": {
            "text": "버스 번호를 선택해주세요."
       },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "80번 - 50002"
                "처음으로"
            ]
        }
EOD;
}

// 책향기마을10/11단지 - 80
else if(strpos($content, "80") !== false && strpos($content, "50002") !== false){
    $url_cmu_80="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=cmu&route=80";
    $bus_cmu_80=file_get_contents($url_cmu_80);
echo <<< EOD
    {
        "message": {
            "text": "$bus_cmu_80"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// 책향기마을10/11단지
else if(strpos($content, "50003") !== false && strpos($content, "교하") !== false){
echo <<< EOD
    {
        "message": {
            "text": "버스 번호를 선택해주세요."
       },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "80번 - 50003"
                "처음으로"
            ]
        }
EOD;
}

// 책향기마을10/11단지 - 80
else if(strpos($content, "80") !== false && strpos($content, "50003") !== false){
    $url_cmg_80="http://juneyoung.kr/api/ghhs-siri-kakao/bus_api.php?station=cmg&route=80";
    $bus_cmg_80=file_get_contents($url_cmg_80);
echo <<< EOD
    {
        "message": {
            "text": "$bus_cmg_80"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    
    }
EOD;
}

// include 자유대화
if(strpos($content, "자유대화") !== false){
echo <<< EOD
    {
        "message": {
            "text": "안녕?\\n(탈출하려면 <처음으로> 입력!)"
        }
    }
EOD;
}

// include 개발자
if(strpos($content, "개발자") !== false){
echo <<< EOD
    {
        "message": {
            "text": "개발자 : 교하고등학교 2학년 6반 강준영\\n\\n기능이 어렵거나 개선이 필요하다면 직접 알려주세요! 연락처는 이 챗봇 어딘가에 숨겨뒀어요!"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    }
EOD;
}

// include 후원
if(strpos($content, "후원") !== false){
echo <<< EOD
    {
        "message": {
            "text": "이 챗봇의 발전을 위해서 개발자가 앞으로 더 많은 밤샘을 해야합니다. 커피 한 잔이면 버틸만 할 거 같아요.\\n\\n토스 : https://get.toss.im/RErc/jIskHW8prK"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
              ]
        }
    }
EOD;
}

// 예외처리
else{
echo <<< EOD
    {
        "message": {
            "text": "개발 중인 기능이거나 잘못된 입력이에요ㅠㅠ"
        },
        "keyboard": { 
            "type": "buttons",
            "buttons": [
                "급식",
                "날씨",
                "시간표",
                "학사일정",
                "버스",
                "자유대화",
                "개발자",
                "후원",
                "도움말",
                "실험실"
            ]
        }
    }    
EOD;
}
?>