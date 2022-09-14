<?php

namespace Database\Seeders;

use App\Models\Address\Province;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    public function run()
    {
        collect([
            [
                'province' => 'प्रदेश नं. १',
                'province_en' => 'Province no 1',
                'districts' => collect([
                    ['district' => 'भोजपुर', 'district_en' => 'Bhojpur', 'localBodies' => collect([
                        [
                            'local_body' => 'भोजपुर नगरपालिका',
                            'local_body_en' => 'Bhojpur Municipality',
                            'wards' => 12,
                        ],
                        [
                            'local_body' => 'षडानन्द नगरपालिका',
                            'local_body_en' => 'Shadananda Municipality',
                            'wards' => 14,
                        ],
                        [
                            'local_body' => 'टेम्केमैयुङ गाउँपालिका',
                            'local_body_en' => 'Temkemayung Rural Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'रामप्रसाद राई गाउँपालिका',
                            'local_body_en' => 'Ram Prasad Rai Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'अरुण गाउँपालिका',
                            'local_body_en' => 'Arun Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'पौवादुङमा गाउँपालिका',
                            'local_body_en' => 'Pauwadungma Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'साल्पासिलिछो गाउँपालिका',
                            'local_body_en' => 'Salpasilicho Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'आमचोक गाउँपालिका',
                            'local_body_en' => 'Amchok Rural Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'हतुवागढी गाउँपालिका',
                            'local_body_en' => 'Hatuwagadhi Rural Municipality',
                            'wards' => 9,
                        ],
                    ])],
                    ['district' => 'धनकुटा', 'district_en' => 'Dhankuta', 'localBodies' => collect([
                        [
                            'local_body' => 'पाख्रिबास नगरपालिका',
                            'local_body_en' => 'Pakhribash Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'धनकुटा नगरपालिका',
                            'local_body_en' => 'Dhankuta Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'महालक्ष्मी नगरपालिका',
                            'local_body_en' => 'Mahalakshmi Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'साँगुरीगढी गाउँपालिका',
                            'local_body_en' => 'Sangurigadhi Rural Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'सहिदभूमि गाउँपालिका',
                            'local_body_en' => 'Sahidbhoomi Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'छथर जोरपाटी गाउँपालिका',
                            'local_body_en' => 'Chhathar Jorpati Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'चौविसे गाउँपालिका',
                            'local_body_en' => 'Chaubise Rural Municipality',
                            'wards' => 8,
                        ],

                    ])],
                    ['district' => 'इलाम', 'district_en' => 'Ilam', 'localBodies' => collect([
                        [
                            'local_body' => 'ईलाम नगरपालिका',
                            'local_body_en' => 'Ilam Municipality',
                            'wards' => 12,
                        ],
                        [
                            'local_body' => 'देउमाई नगरपालिका',
                            'local_body_en' => 'Deumai Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'माई नगरपालिका',
                            'local_body_en' => 'Mai Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'सूर्योदय नगरपालिका',
                            'local_body_en' => 'Suryoday Municipality',
                            'wards' => 14,
                        ],
                        [
                            'local_body' => 'फाकफोकथुम गाउँपालिका',
                            'local_body_en' => 'Fakphokathum Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'चुलाचुली गाउँपालिका',
                            'local_body_en' => 'Chulachuli Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'माईजोगमाई गाउँपालिका',
                            'local_body_en' => 'Maijogmai Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'माङसेबुङ गाउँपालिका',
                            'local_body_en' => 'Mangsebung Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'रोङ गाउँपालिका',
                            'local_body_en' => 'Rong Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'सन्दकपुर गाउँपालिका',
                            'local_body_en' => 'Sandakpur Rural Municipality',
                            'wards' => 5,
                        ],
                    ])],
                    ['district' => 'झापा', 'district_en' => 'Jhapa', 'localBodies' => collect([
                        [
                            'local_body' => 'मेचीनगर नगरपालिका',
                            'local_body_en' => 'Mechinagar Municipality',
                            'wards' => 15,
                        ],
                        [
                            'local_body' => 'दमक नगरपालिका',
                            'local_body_en' => 'Damak Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'कन्काई नगरपालिका',
                            'local_body_en' => 'Kankai Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'भद्रपुर नगरपालिका',
                            'local_body_en' => 'Bhadrapur Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'अर्जुनधारा नगरपालिका',
                            'local_body_en' => 'Arjundhara Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'शिवशताक्षी नगरपालिका',
                            'local_body_en' => 'Shivshatakshi Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'गौरादह नगरपालिका',
                            'local_body_en' => 'Gauradaha Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'विर्तामोड नगरपालिका',
                            'local_body_en' => 'Virtamod Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'कमल गाउँपालिका',
                            'local_body_en' => 'Kamal Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'गौरीगंज गाउँपालिका',
                            'local_body_en' => 'Gauriganj Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'बाह्रदशी गाउँपालिका',
                            'local_body_en' => 'Bahardashi Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'झापा गाउँपालिका',
                            'local_body_en' => 'Jhapa Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'बुद्धशान्ति गाउँपालिका',
                            'local_body_en' => 'Buddhashanti Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'हल्दिवारी गाउँपालिका',
                            'local_body_en' => 'Haldiwari Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'कचनकवल गाउँपालिका',
                            'local_body_en' => 'Kachankawal Rural Municipality',
                            'wards' => 7,
                        ],
                    ])],
                    ['district' => 'खोटाँग', 'district_en' => 'Khotang', 'localBodies' => collect([
                        [
                            'local_body' => 'हलेसी तुवाचुङ नगरपालिका',
                            'local_body_en' => 'Halesi Tuvachung Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'दिक्तेल रुपाकोट मझुवागढी नगरपालिका',
                            'local_body_en' => 'Diktel Rupakot Mazhuwagadi Municipality',
                            'wards' => 15,
                        ],
                        [
                            'local_body' => 'ऐसेलुखर्क गाउँपालिका',
                            'local_body_en' => 'Aiselukharka Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'रावा बेसी गाउँपालिका',
                            'local_body_en' => 'Rawa Besi Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'जन्तेढुंगा गाउँपालिका',
                            'local_body_en' => 'Jantedhunga Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'खोटेहाङ गाउँपालिका',
                            'local_body_en' => 'Khotehang Rural Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'केपिलासगढी गाउँपालिका',
                            'local_body_en' => 'Kepilasgadhi Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'दिप्रुङ चुइचुम्मा गाउँपालिका',
                            'local_body_en' => 'Diprung Chuichumma Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'साकेला गाउँपालिका',
                            'local_body_en' => 'Sakela Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'वराहपोखरी गाउँपालिका',
                            'local_body_en' => 'Barahpokhari Rural Municipality',
                            'wards' => 6,
                        ],
                    ])],
                    ['district' => 'मोरंग', 'district_en' => 'Morang', 'localBodies' => collect([
                        [
                            'local_body' => 'विराटनगर महानगरपालिका',
                            'local_body_en' => 'Biratnagar Metropolitan City',
                            'wards' => 19,
                        ],
                        [
                            'local_body' => 'बेलवारी नगरपालिका',
                            'local_body_en' => 'Belwari Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'लेटाङ नगरपालिका',
                            'local_body_en' => 'Letang Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'पथरी शनिश्चरे नगरपालिका',
                            'local_body_en' => 'Pathari Shanischare Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'रंगेली नगरपालिका',
                            'local_body_en' => 'Rangeli Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'रतुवामाई नगरपालिका',
                            'local_body_en' => 'Ratuwamai Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'सुनवर्षि नगरपालिका',
                            'local_body_en' => 'Sunvarshi Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'उर्लावारी नगरपालिका',
                            'local_body_en' => 'Urlavari Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'सुन्दरहरैचा नगरपालिका',
                            'local_body_en' => 'Sundaraharaicha Municipality',
                            'wards' => 12,
                        ],
                        [
                            'local_body' => 'बुढीगंगा गाउँपालिका',
                            'local_body_en' => 'Budhiganga Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'धनपालथान गाउँपालिका',
                            'local_body_en' => 'Dhanpalathan Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'ग्रामथान गाउँपालिका',
                            'local_body_en' => 'Gramthan Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'जहदा गाउँपालिका',
                            'local_body_en' => 'Jahada Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'कानेपोखरी गाउँपालिका',
                            'local_body_en' => 'Kanepokhari Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'कटहरी गाउँपालिका',
                            'local_body_en' => 'Katahari Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'केरावारी गाउँपालिका',
                            'local_body_en' => 'Kerabari Rural Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'मिक्लाजुङ गाउँपालिका',
                            'local_body_en' => 'Miklajung Rural Municipality',
                            'wards' => 9,
                        ],
                    ])],
                    ['district' => 'ओखलढुंगा', 'district_en' => 'Okhaldhunga', 'localBodies' => collect([
                        [
                            'local_body' => 'सिद्दिचरण नगरपालिका',
                            'local_body_en' => 'Siddicharan Municipality',
                            'wards' => 12,
                        ],
                        [
                            'local_body' => 'खिजिदेम्बा गाउँपालिका',
                            'local_body_en' => 'Khijidemba Rural Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'चम्पादेवी गाउँपालिका',
                            'local_body_en' => 'Champadevi Rural Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'चिशंखुगढी गाउँपालिका',
                            'local_body_en' => 'Chishankhugadhi Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'मानेभञ्याङ गाउँपालिका',
                            'local_body_en' => 'Manebhanyang Rural Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'मोलुङ गाउँपालिका',
                            'local_body_en' => 'Molung Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'लिखु गाउँपालिका',
                            'local_body_en' => 'Likhu Rural Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'सुनकोशी गाउँपालिका',
                            'local_body_en' => 'Sunkoshi Rural Municipality',
                            'wards' => 10,
                        ],
                    ])],
                    ['district' => 'पांचथर', 'district_en' => 'Panchthar', 'localBodies' => collect([
                        [
                            'local_body' => 'फिदिम नगरपालिका',
                            'local_body_en' => 'Phidim Municipality',
                            'wards' => 14,
                        ],
                        [
                            'local_body' => 'फालेलुङ गाउँपालिका',
                            'local_body_en' => 'Phalelung Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'फाल्गुनन्द गाउँपालिका',
                            'local_body_en' => 'Falgunand Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'हिलिहाङ गाउँपालिका',
                            'local_body_en' => 'Hilihang Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'कुम्मायक गाउँपालिका',
                            'local_body_en' => 'Kummayak Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'मिक्लाजुङ गाउँपालिका',
                            'local_body_en' => 'Miklajung Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'तुम्बेवा गाउँपालिका',
                            'local_body_en' => 'Tumbewa Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'याङवरक गाउँपालिका',
                            'local_body_en' => 'Yangwarak Rural Municipality',
                            'wards' => 6,
                        ],
                    ])],
                    ['district' => 'संखुवासभा', 'district_en' => 'Sankhuwasabha', 'localBodies' => collect([
                        [
                            'local_body' => 'चैनपुर नगरपालिका',
                            'local_body_en' => 'Chainpur Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'धर्मदेवी नगरपालिका',
                            'local_body_en' => 'Dharmadevi Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'खाँदवारी नगरपालिका',
                            'local_body_en' => 'Khandwari Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'मादी नगरपालिका',
                            'local_body_en' => 'Madi Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'पाँचखपन नगरपालिका',
                            'local_body_en' => 'Panchkhapan Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'भोटखोला गाउँपालिका',
                            'local_body_en' => 'Bhotkhola Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'चिचिला गाउँपालिका',
                            'local_body_en' => 'Chichila Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'मकालु गाउँपालिका',
                            'local_body_en' => 'Makalu Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'सभापोखरी गाउँपालिका',
                            'local_body_en' => 'Sabhapokhari Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'सिलीचोङ गाउँपालिका',
                            'local_body_en' => 'Silichong Rural Municipality',
                            'wards' => 5,
                        ],
                    ])],
                    ['district' => 'सोलुखुम्बू', 'district_en' => 'Solukhumbu', 'localBodies' => collect([
                        [
                            'local_body' => 'सोलुदुधकुण्ड नगरपालिका',
                            'local_body_en' => 'Solududhakunda Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'माप्य गाउँपालिका',
                            'local_body_en' => 'Mapya Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'खुम्वु पासाङल्हमु गाउँपालिका',
                            'local_body_en' => 'Khumvu Pasanglhamu Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'थुलुङ दुधकोशी गाउँपालिका',
                            'local_body_en' => 'Thulung Dudhkoshi Rural Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'नेचासल्यान गाउँपालिका',
                            'local_body_en' => 'Nechasalyan Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'माहाकुलुङ गाउँपालिका',
                            'local_body_en' => 'Mahakulung Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'लिखु पिके गाउँपालिका',
                            'local_body_en' => 'Likhu Pike Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'सोताङ गाउँपालिका',
                            'local_body_en' => 'Sotang Rural Municipality',
                            'wards' => 5,
                        ],
                    ])],
                    ['district' => 'सुनसरी', 'district_en' => 'Sunsari', 'localBodies' => collect([
                        [
                            'local_body' => 'ईटहरी उपमहानगरपालिका',
                            'local_body_en' => 'Itahari Sub-metropolitan',
                            'wards' => 20,
                        ],
                        [
                            'local_body' => 'धरान उपमहानगरपालिका',
                            'local_body_en' => 'Dharan Sub-metropolitan',
                            'wards' => 20,
                        ],
                        [
                            'local_body' => 'ईनरुवा नगरपालिका',
                            'local_body_en' => 'Inaruwa Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'दुहवी नगरपालिका',
                            'local_body_en' => 'Duhavi Municipality',
                            'wards' => 12,
                        ],
                        [
                            'local_body' => 'रामधुनी नगरपालिका',
                            'local_body_en' => 'Ramdhuni Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'बराहक्षेत्र नगरपालिका',
                            'local_body_en' => 'Barakhshetra Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'देवानगञ्ज गाउँपालिका',
                            'local_body_en' => 'Dewanganj Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'कोशी गाउँपालिका',
                            'local_body_en' => 'Koshi Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'गढी गाउँपालिका',
                            'local_body_en' => 'Gadhi Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'बर्जु गाउँपालिका',
                            'local_body_en' => 'Barju Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'भोक्राहा नरसिंह गाउँपालिका',
                            'local_body_en' => 'Bhokraha Narasimha Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'हरिनगर गाउँपालिका',
                            'local_body_en' => 'Harinagar Rural Municipality',
                            'wards' => 7,
                        ],
                    ])],
                    ['district' => 'ताप्लेजुंग', 'district_en' => 'Taplejung', 'localBodies' => collect([
                        [
                            'local_body' => 'फुङलिङ नगरपालिका',
                            'local_body_en' => 'Phungling Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'आठराई त्रिवेणी गाउँपालिका',
                            'local_body_en' => 'Atharai Triveni Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'सिदिङ्वा गाउँपालिका',
                            'local_body_en' => 'Sidingwa Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'फक्ताङलुङ गाउँपालिका',
                            'local_body_en' => 'Phaktanglung Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'मिक्वाखोला गाउँपालिका',
                            'local_body_en' => 'Mikwakhola Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'मेरिङदेन गाउँपालिका',
                            'local_body_en' => 'Meringden Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'मैवाखोला गाउँपालिका',
                            'local_body_en' => 'Maiwakhola Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'पाथीभरा याङवरक गाउँपालिका',
                            'local_body_en' => 'Pathibhara Yangwarak Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'सिरीजङ्घा गाउँपालिका',
                            'local_body_en' => 'Sirijangha Rural Municipality',
                            'wards' => 8,
                        ],
                    ])],
                    ['district' => 'तेह्रथुम', 'district_en' => 'Terhathum', 'localBodies' => collect([
                        [
                            'local_body' => 'म्याङलुङ नगरपालिका',
                            'local_body_en' => 'Manglung Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'लालीगुराँस नगरपालिका',
                            'local_body_en' => 'Laligurans Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'आठराई गाउँपालिका',
                            'local_body_en' => 'Atharai Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'छथर गाउँपालिका',
                            'local_body_en' => 'Chhathar Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'फेदाप गाउँपालिका',
                            'local_body_en' => 'Phedap Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'मेन्छयायेम गाउँपालिका',
                            'local_body_en' => 'Menchyayem Rural Municipality',
                            'wards' => 6,
                        ],
                    ])],
                    ['district' => 'उदयपुर', 'district_en' => 'Udayapur', 'localBodies' => collect([
                        [
                            'local_body' => 'कटारी नगरपालिका',
                            'local_body_en' => 'Katari Municipality',
                            'wards' => 14,
                        ],
                        [
                            'local_body' => 'चौदण्डीगढी नगरपालिका',
                            'local_body_en' => 'Chaudandigarhi Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'त्रियुगा नगरपालिका',
                            'local_body_en' => 'Triyuga Municipality',
                            'wards' => 16,
                        ],
                        [
                            'local_body' => 'वेलका नगरपालिका',
                            'local_body_en' => 'Belka Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'उदयपुरगढी गाउँपालिका',
                            'local_body_en' => 'Udayapurgadhi Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'ताप्ली गाउँपालिका',
                            'local_body_en' => 'Tapli Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'रौतामाई गाउँपालिका',
                            'local_body_en' => 'Rautamai Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'लिम्चुङ्बुङ गाउँपालिका',
                            'local_body_en' => 'Limchungbung Rural Municipality',
                            'wards' => 5,
                        ],
                    ])],
                ]),
            ],
            [
                'province' => 'मदेश प्रदेश',
                'province_en' => 'Madhesh Province',
                'districts' => collect([
                    ['district_en' => 'Parsa', 'district' => 'पर्सा', 'localBodies' => collect([
                        [
                            'local_body' => 'बिरगंज महानगरपालिका',
                            'local_body_en' => 'Birgunj Metropolitan',
                            'wards' => 32,
                        ],
                        [
                            'local_body' => 'पोखरिया नगरपालिका',
                            'local_body_en' => 'Pokhariya Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'बहुदरमाई  नगरपालिका',
                            'local_body_en' => 'Bahudarmai Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'पर्सागढी नगरपालिका',
                            'local_body_en' => 'Parsagadhi Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'ठोरी गाउँपालिका',
                            'local_body_en' => 'Thori Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'जगरनाथपुर गाउँपालिका',
                            'local_body_en' => 'Jagarnathpur Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'धोबीनी गाउँपालिका',
                            'local_body_en' => 'Dhobini Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'छिपहरमाईगाउँपालिका',
                            'local_body_en' => 'Chhipaharmai Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'पकाहा मैनपुर गाउँपालिका',
                            'local_body_en' => 'Pakaha Mainpur Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'बिन्दबासिनी गाउँपालिका',
                            'local_body_en' => 'Bindabasini Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'सखुवा प्रसौनी गाउँपालिका',
                            'local_body_en' => 'Sakhuwa Prasauni Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'पटेर्वा सुगौली गाउँपालिका',
                            'local_body_en' => 'Paterwa Sugauli Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'कालिकामाई  गाउँपालिका',
                            'local_body_en' => 'Kalikamai Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'जिरा भवानी  गाउँपालिका',
                            'local_body_en' => 'Jira Bhawani Rural Municipality',
                            'wards' => 5,
                        ],
                    ])],
                    ['district_en' => 'Bara', 'district' => 'बारा', 'localBodies' => collect([
                        [
                            'local_body' => 'कलैया उपमहानगरपालिका',
                            'local_body_en' => 'Kalaiya Sub-Metropolitan',
                            'wards' => 27,
                        ],
                        [
                            'local_body' => 'जीतपुर सिमरा उपमहानगरपालिका',
                            'local_body_en' => 'Jitpur Simara Sub-Metropolitan',
                            'wards' => 24,
                        ],
                        [
                            'local_body' => 'कोल्हवी  नगरपालिका',
                            'local_body_en' => 'Kolhavi Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'निजगढ नगरपालिका',
                            'local_body_en' => 'Nijgadh Municipality',
                            'wards' => 13,
                        ],
                        [
                            'local_body' => 'महागढीमाई नगरपालिका',
                            'local_body_en' => 'Mahagadhimai Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'सिम्रौनगढ नगरपालिका',
                            'local_body_en' => 'Simraungadh Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'पचरौता नगरपालिका',
                            'local_body_en' => 'Pacharauta Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'आदर्श कोटवाल गाउँपालिका',
                            'local_body_en' => 'Adarsh Kotwal Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'करैयामाई गाउँपालिका',
                            'local_body_en' => 'Karaiyamai Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'देवताल  गाउँपालिका',
                            'local_body_en' => 'Devtal Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'परवानीपुर  गाउँपालिका',
                            'local_body_en' => 'Parwanipur Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'प्रसौनी  गाउँपालिका',
                            'local_body_en' => 'Prasauni Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'फेटा  गाउँपालिका',
                            'local_body_en' => 'Pheta Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'बारागढी  गाउँपालिका',
                            'local_body_en' => 'Baragadhi Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'सुवर्ण   गाउँपालिका',
                            'local_body_en' => 'Suwarn Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'विश्रामपुर गाउँपालिका',
                            'local_body_en' => 'Vishrampur Rural Municipality',
                            'wards' => 5,
                        ],
                    ])],
                    ['district_en' => 'Rautahat', 'district' => 'रौतहट', 'localBodies' => collect([
                        [
                            'local_body' => 'चन्द्रपुर नगरपालिका',
                            'local_body_en' => 'Chandrapur Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'गरुडा नगरपालिका',
                            'local_body_en' => 'Garuda Municipality ',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'गौर  नगरपालिका',
                            'local_body_en' => 'Gour Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'बौधीमाई नगरपालिका',
                            'local_body_en' => 'Baudhimai Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'बृन्दावन  नगरपालिका',
                            'local_body_en' => 'Brindavan Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'देवाही गोनाही नगरपालिका',
                            'local_body_en' => 'Devahi Gonahi Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'गढीमाई नगरपालिका',
                            'local_body_en' => 'Gadhimai Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'गुजरा  नगरपालिका',
                            'local_body_en' => 'Gajura Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'कटहरिया नगरपालिका',
                            'local_body_en' => 'Katahariya Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'माधव नारायण नगरपालिका',
                            'local_body_en' => 'Madhav Narayan Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'मौलापुर नगरपालिका',
                            'local_body_en' => 'Maulapur Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'फतुवाबिजयपुर नगरपालिका',
                            'local_body_en' => 'Phatuwabijaypur Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'ईशनाथ नगरपालिका',
                            'local_body_en' => 'Ishnath Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'परोहा नगरपालिका',
                            'local_body_en' => 'Paroha Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'राजपुर नगरपालिका',
                            'local_body_en' => 'Rajpur Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'राजदेवी नगरपालिका',
                            'local_body_en' => 'Rajdevi Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'दुर्गा भगवती गाउँपालिका',
                            'local_body_en' => 'Durga Bhagawati Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'यमुनामाई गाउँपालिका',
                            'local_body_en' => 'Yamunamai Rural Municipality',
                            'wards' => 5,
                        ],
                    ])],
                    ['district_en' => 'Sarlahi', 'district' => 'सर्लाही', 'localBodies' => collect([
                        [
                            'local_body' => 'ईश्वरपुर नगरपालिका',
                            'local_body_en' => 'Ishworpur Municipality',
                            'wards' => 15,
                        ],
                        [
                            'local_body' => 'मलंगवा नगरपालिका',
                            'local_body_en' => 'Mangawa Municipality ',
                            'wards' => 12,
                        ],
                        [
                            'local_body' => 'लालबन्दी  नगरपालिका',
                            'local_body_en' => 'Lalbandi Municipality',
                            'wards' => 17,
                        ],
                        [
                            'local_body' => 'हरिपुर नगरपालिका',
                            'local_body_en' => 'Haripur Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'हरिपुर्वा  नगरपालिका',
                            'local_body_en' => 'Haripurwa Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'हरिवन नगरपालिका',
                            'local_body_en' => 'Hariwan Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'बरहथवा नगरपालिका',
                            'local_body_en' => 'Barhathawa Municipality',
                            'wards' => 18,
                        ],
                        [
                            'local_body' => 'बलरा  नगरपालिका',
                            'local_body_en' => 'Balara Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'गोडैटा नगरपालिका',
                            'local_body_en' => 'Godaita Municipality',
                            'wards' => 12,
                        ],
                        [
                            'local_body' => 'बागमती नगरपालिका',
                            'local_body_en' => 'Bagmati Municipality',
                            'wards' => 12,
                        ],
                        [
                            'local_body' => 'कविलासीनगरपालिका',
                            'local_body_en' => 'Kawilasi Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'चक्रघट्टा गाउँपालिका',
                            'local_body_en' => 'Chakraghatta Rural Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'चन्द्रनगर गाउँपालिका',
                            'local_body_en' => 'Chandranagar Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'धनकौल गाउँपालिका',
                            'local_body_en' => 'Dhankoul Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'ब्रह्मपुरी गाउँपालिका',
                            'local_body_en' => 'Brahmapuri Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'रामनगर  गाउँपालिका',
                            'local_body_en' => 'Ramnagar Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'विष्णु गाउँपालिका',
                            'local_body_en' => 'Bishnu Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'कौडेना  गाउँपालिका',
                            'local_body_en' => 'Kaudena Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'पर्सा गाउँपालिका',
                            'local_body_en' => 'Parsa Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'बसबरीया गाउँपालिका',
                            'local_body_en' => 'Basbariya Rural Municipality',
                            'wards' => 6,
                        ],
                    ])],
                    ['district_en' => 'Dhanusha', 'district' => 'धनुषा', 'localBodies' => collect([
                        [
                            'local_body' => 'जनकपुरधाम उपमहानगरपालिका',
                            'local_body_en' => 'Janakpurdham Sub-Metropolitan',
                            'wards' => 25,
                        ],
                        [
                            'local_body' => 'क्षिरेश्वरनाथ नगरपालिका',
                            'local_body_en' => 'Kshireshwar Nath Municipality ',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'गणेशमान चारनाथ नगरपालिका',
                            'local_body_en' => 'Ganeshman Charnath Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'धनुषाधाम नगरपालिका',
                            'local_body_en' => 'Dhanushadham Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'नगराइन  नगरपालिका',
                            'local_body_en' => 'Nagarain Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'विदेह नगरपालिका',
                            'local_body_en' => 'Wideha Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'मिथिला नगरपालिका',
                            'local_body_en' => 'Mithila Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'शहीदनगर  नगरपालिका',
                            'local_body_en' => 'Shahidnagar Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'सबैला नगरपालिका',
                            'local_body_en' => 'Sabaila Municipality',
                            'wards' => 13,
                        ],
                        [
                            'local_body' => 'कमला नगरपालिका',
                            'local_body_en' => 'Kamala Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'मिथिला बिहारी नगरपालिका',
                            'local_body_en' => 'Mithila Bihari Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'हंसपुर नगरपालिका',
                            'local_body_en' => 'Hansapur Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'जनकनन्दिनी गाउँपालिका',
                            'local_body_en' => 'janakandani Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'बटेश्वर गाउँपालिका',
                            'local_body_en' => 'Bateshwar Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'मुखियापट्टी मुसहरमिया गाउँपालिका',
                            'local_body_en' => 'Mukhiyapatti Musaharmiya Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'लक्ष्मीनिया  गाउँपालिका',
                            'local_body_en' => 'Laxminiya Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'औरही गाउँपालिका',
                            'local_body_en' => 'Aurahi Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'धनौजी गाउँपालिका',
                            'local_body_en' => 'Dhanauji Rural Municipality',
                            'wards' => 5,
                        ],
                    ])],
                    ['district_en' => 'Siraha', 'district' => 'सिराहा', 'localBodies' => collect([
                        [
                            'local_body' => 'लहान नगरपालिका',
                            'local_body_en' => 'Lahan Municipality',
                            'wards' => 24,
                        ],
                        [
                            'local_body' => 'धनगढीमाई नगरपालिका',
                            'local_body_en' => 'Dhangadhimai Municipality ',
                            'wards' => 14,
                        ],
                        [
                            'local_body' => 'सिरहा  नगरपालिका',
                            'local_body_en' => 'Siraha Municipality',
                            'wards' => 22,
                        ],
                        [
                            'local_body' => 'गोलबजार नगरपालिका',
                            'local_body_en' => 'Golbazar Municipality',
                            'wards' => 13,
                        ],
                        [
                            'local_body' => 'मिर्चैयाँ   नगरपालिका',
                            'local_body_en' => 'Mirchaiya Municipality',
                            'wards' => 12,
                        ],
                        [
                            'local_body' => 'कल्याणपुर नगरपालिका',
                            'local_body_en' => 'Kalyanpur Municipality',
                            'wards' => 12,
                        ],
                        [
                            'local_body' => 'कर्जन्हा नगरपालिका',
                            'local_body_en' => 'Karjanha Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'सुखीपुर नगरपालिका',
                            'local_body_en' => 'Sukhipur Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'भगवानपुर गाउँपालिका',
                            'local_body_en' => 'Bhagawanpur Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'औरही गाउँपालिका',
                            'local_body_en' => 'Aurahi Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'विष्णुपुर गाउँपालिका',
                            'local_body_en' => 'Bishnupur Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'बरियारपट्टी गाउँपालिका',
                            'local_body_en' => 'Bariyarpatti Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'लक्ष्मीपुर पतारी गाउँपालिका',
                            'local_body_en' => 'Laxmipur Patari Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'नरहा गाउँपालिका',
                            'local_body_en' => 'Naraha Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'सखुवानान्कारकट्टी  गाउँपालिका',
                            'local_body_en' => 'Sakhuvanankarkatti Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'अर्नमा   गाउँपालिका',
                            'local_body_en' => 'Arnama Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'नवराजपुर गाउँपालिका',
                            'local_body_en' => 'Nawarajpur Rural Municipality',
                            'wards' => 5,
                        ],
                    ])],
                    ['district_en' => 'Mahottari', 'district' => 'महोत्तरी', 'localBodies' => collect([
                        [
                            'local_body' => 'जलेश्वर नगरपालिका',
                            'local_body_en' => 'Jaleshwar Municipality',
                            'wards' => 12,
                        ],
                        [
                            'local_body' => 'बर्दिबास नगरपालिका',
                            'local_body_en' => 'Bardibas Municipality ',
                            'wards' => 14,
                        ],
                        [
                            'local_body' => 'गौशाला  नगरपालिका',
                            'local_body_en' => 'Gaushala Municipality',
                            'wards' => 12,
                        ],
                        [
                            'local_body' => 'लोहरपट्टी नगरपालिका',
                            'local_body_en' => 'Loharpatti Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'रामगोपालपुर   नगरपालिका',
                            'local_body_en' => 'Ramgopalpur Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'मनरा शिसवा नगरपालिका',
                            'local_body_en' => 'Manara Shisawa Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'मटिहानी  नगरपालिका',
                            'local_body_en' => 'Matihani Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'भँगाहा  नगरपालिका',
                            'local_body_en' => 'Bhangaha Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'बलवा   नगरपालिका',
                            'local_body_en' => 'Balawa Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'औरही  नगरपालिका',
                            'local_body_en' => 'Aurahi Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'एकडारा गाउँपालिका',
                            'local_body_en' => 'Yekdara Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'सोनमा  गाउँपालिका',
                            'local_body_en' => 'Sonama Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'साम्सी   गाउँपालिका',
                            'local_body_en' => 'Samsi Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'महोत्तरी गाउँपालिका',
                            'local_body_en' => 'Mahottari Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'पिपरा गाउँपालिका',
                            'local_body_en' => 'Pipara Rural Municipality',
                            'wards' => 7,
                        ],
                    ])],
                    ['district_en' => 'Saptari', 'district' => 'सप्तरी', 'localBodies' => collect([
                        [
                            'local_body' => 'राजविराज नगरपालिका',
                            'local_body_en' => 'Rajviraj Municipality',
                            'wards' => 16,
                        ],
                        [
                            'local_body' => 'कञ्चनरुप नगरपालिका',
                            'local_body_en' => 'Kanchanrup Municipality ',
                            'wards' => 12,
                        ],
                        [
                            'local_body' => 'डाक्नेश्वरी  नगरपालिका',
                            'local_body_en' => 'Dakneshwori Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'बोदेबरसाईननगरपालिका',
                            'local_body_en' => 'Bodebarsain Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'खडक   नगरपालिका',
                            'local_body_en' => 'Khadak Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'शम्भुनाथ नगरपालिका',
                            'local_body_en' => 'Shanbhunath Municipality',
                            'wards' => 12,
                        ],
                        [
                            'local_body' => 'सुरुङ्‍गा  नगरपालिका',
                            'local_body_en' => 'Surunga Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'हनुमाननगर कङ्‌कालिनी   नगरपालिका',
                            'local_body_en' => 'Hanuman Nagar Kangkalini Municipality',
                            'wards' => 14,
                        ],
                        [
                            'local_body' => 'सप्तकोशी   नगरपालिका',
                            'local_body_en' => 'Saptakoshi Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'अग्निसाइर कृष्णासरवन गाउँपालिका',
                            'local_body_en' => 'Agnisair Krishnasaravan Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'छिन्नमस्ता  गाउँपालिका',
                            'local_body_en' => 'Chhinnamasta Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'महादेवा   गाउँपालिका',
                            'local_body_en' => 'Mahadewa Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'तिरहुत गाउँपालिका',
                            'local_body_en' => 'Tirhut Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'तिलाठी कोईलाडी गाउँपालिका',
                            'local_body_en' => 'Tilathi Koiladi Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'रुपनी गाउँपालिका',
                            'local_body_en' => 'Rupani Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'राजगढ गाउँपालिका',
                            'local_body_en' => 'Rajgadh Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'बिष्णुपुर गाउँपालिका',
                            'local_body_en' => 'Bishnupur Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'बलान-बिहुल गाउँपालिका',
                            'local_body_en' => 'Balan-Bihul Rural Municipality',
                            'wards' => 6,
                        ],
                    ])],
                ]),
            ],
            [
                'province' => 'वाग्मती प्रदेश',
                'province_en' => 'Bagmaati Province',
                'districts' => collect([
                    ['district_en' => 'Sindhuli', 'district' => 'सिन्धुली',
                        'localBodies' => collect([
                            [
                                'local_body' => 'कमलामाई नगरपालिका',
                                'local_body_en' => 'Kamalamai Municipality',
                                'wards' => 14,
                            ],
                            [
                                'local_body' => ' दुधौली  नगरपालिका',
                                'local_body_en' => 'Dudhauli Municipality',
                                'wards' => 14,
                            ],
                            [
                                'local_body' => 'गोलन्जर गाउँपालिका',
                                'local_body_en' => 'Golanjar Rural municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'घ्याङलेख गाउँपालिका',
                                'local_body_en' => 'Ghyanglekh Rural municipality',
                                'wards' => 5,
                            ],
                            [
                                'local_body' => 'तीनपाटन गाउँपालिका',
                                'local_body_en' => 'Tinpatan Rural municipality',
                                'wards' => 11,
                            ],
                            [
                                'local_body' => 'फिक्कल गाउँपालिका',
                                'local_body_en' => 'phikkal Rural municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'मरिण गाउँपालिका',
                                'local_body_en' => 'Marin  Rural municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'सुनकोशी गाउँपालिका',
                                'local_body_en' => 'Sunkoshi  Rural municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'हरिहरपुरगढी गाउँपालिका',
                                'local_body_en' => 'Hariharpurgadhi Rural municipality',
                                'wards' => 8,
                            ],
                        ]), ],
                    ['district_en' => 'Ramechhap', 'district' => 'रामेछाप', 'localBodies' => collect([
                        [
                            'local_body' => 'मन्थली नगरपालिका',
                            'local_body_en' => 'Mnthaly Municipality',
                            'wards' => 14,
                        ],
                        [
                            'local_body' => 'रामेछाप नगरपालिका',
                            'local_body_en' => 'Ramechhap Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'उमाकुण्ड गाउँपालिका',
                            'local_body_en' => 'Umakunda Rural municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'खाँडादेवी गाउँपालिका',
                            'local_body_en' => 'Khandadevi Rural municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'गोकुलगङ्गा गाउँपालिका',
                            'local_body_en' => 'Gokulganga Rural municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'दोरम्बा शैंलुङ गाउँपालिका',
                            'local_body_en' => 'Doramba Shanlung Rural municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => ' लिखु तामाकोशी गाउँपालिका',
                            'local_body_en' => 'Likhu Tamakoshi Rural municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'सुनापती गाउँपालिका',
                            'local_body_en' => 'Sunapati Rural municipality',
                            'wards' => 5,
                        ],

                    ])],
                    ['district_en' => 'Dolakha', 'district' => 'दोलखा',
                        'localBodies' => collect([
                            [
                                'local_body' => 'जिरी नगरपालिका',
                                'local_body_en' => 'Jiri Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'भिमेश्वर नगरपालिका',
                                'local_body_en' => 'Bhimeshwar Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'कालिन्चोक गाउँपालिका',
                                'local_body_en' => 'Kalinchok Rural municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'गौरीशङ्कर गाउँपालिका',
                                'local_body_en' => 'Gaurishankar Rural municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'तामाकोशी गाउँपालिका',
                                'local_body_en' => 'Tamakoshi Rural municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'मेलुङ्ग गाउँपालिका',
                                'local_body_en' => 'Melung Rural municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'विगु गाउँपालिका',
                                'local_body_en' => 'Vigu Rural municipality',
                                'wards' => 8,
                            ],
                            [
                                'local_body' => 'वैतेश्वर गाउँपालिका',
                                'local_body_en' => 'Vaiteshwar Rural municipality',
                                'wards' => 8,
                            ],
                            [
                                'local_body' => 'शैलुङ्ग गाउँपालिका',
                                'local_body_en' => 'Shailung Rural municipality',
                                'wards' => 8,
                            ],

                        ]), ],
                    ['district_en' => 'Bhaktapur', 'district' => 'भक्तपुर',
                        'localBodies' => collect([
                            [
                                'local_body' => 'चाँगुनारायण नगरपालिका',
                                'local_body_en' => 'Changunarayan Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'भक्तपुर नगरपालिका',
                                'local_body_en' => 'Bhaktapur Municipality',
                                'wards' => 10,
                            ],
                            [
                                'local_body' => 'मध्यपुर थिमी नगरपालिका',
                                'local_body_en' => ' Madhyapur Thimi Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'सूर्यविनायक नगरपालिका',
                                'local_body_en' => 'Suryabinayak Municipality',
                                'wards' => 10,
                            ],

                        ]), ],
                    ['district_en' => 'Dhading', 'district' => 'धादिङ',
                        'localBodies' => collect([
                            [
                                'local_body' => 'धुनीबेंशी नगरपालिका',
                                'local_body_en' => 'Dhunibenshi Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'निलकण्ठ नगरपालिका',
                                'local_body_en' => 'Nilkantha Municipality',
                                'wards' => 14,
                            ],
                            [
                                'local_body' => 'खनियाबास गाउँपालिका',
                                'local_body_en' => 'Khaniyabas Rural municipality',
                                'wards' => 5,
                            ],
                            [
                                'local_body' => 'गजुरी गाउँपालिका',
                                'local_body_en' => 'Gajuri Rural municipality',
                                'wards' => 8,
                            ],
                            [
                                'local_body' => 'गल्छी गाउँपालिका',
                                'local_body_en' => 'Galchi Rural municipality',
                                'wards' => 8,
                            ],
                            [
                                'local_body' => 'गङ्गाजमुना गाउँपालिका',
                                'local_body_en' => 'Gangajmuna Rural municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'ज्वालामूखी गाउँपालिका',
                                'local_body_en' => 'Jwalamukhi Rural municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'थाक्रे गाउँपालिका',
                                'local_body_en' => 'Thakre Rural municipality',
                                'wards' => 11,
                            ],
                            [
                                'local_body' => ' नेत्रावती डबजोङ गाउँपालिका',
                                'local_body_en' => 'Netravati Dabjong Rural municipality',
                                'wards' => 5,
                            ],
                            [
                                'local_body' => 'बेनीघाट रोराङ्ग गाउँपालिका',
                                'local_body_en' => 'Benighat Rorang Rural municipality',
                                'wards' => 10,
                            ],
                            [
                                'local_body' => 'रुवी भ्याली गाउँपालिका',
                                'local_body_en' => 'Rubi Valley Rural municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'सिद्धलेक गाउँपालिका',
                                'local_body_en' => 'Siddhalek Rural municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'त्रिपुरासुन्दरी गाउँपालिका',
                                'local_body_en' => 'Tripura Sundari Rural municipality',
                                'wards' => 7,
                            ],

                        ]), ],
                    ['district_en' => 'Kathmandu', 'district' => 'काठमाडौँ',
                        'localBodies' => collect([
                            [
                                'local_body' => 'काठमाण्डौं महानगरपालिका',
                                'local_body_en' => 'Kathmandu Metropolitan',
                                'wards' => 32,
                            ],
                            [
                                'local_body' => 'कागेश्वरी मनोहरा नगरपालिका',
                                'local_body_en' => 'Kageshwari Manohara Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'कीर्तिपुर नगरपालिका',
                                'local_body_en' => 'Kirtipur Municipality',
                                'wards' => 10,
                            ],
                            [
                                'local_body' => 'गोकर्णेश्वर नगरपालिका',
                                'local_body_en' => 'Gokarneshwar Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'चन्द्रागिरी नगरपालिका',
                                'local_body_en' => 'Chandragiri Municipality',
                                'wards' => 15,
                            ],
                            [
                                'local_body' => 'टोखा नगरपालिका',
                                'local_body_en' => 'Tokha Municipality',
                                'wards' => 11,
                            ],
                            [
                                'local_body' => 'तारकेश्वर नगरपालिका',
                                'local_body_en' => 'Tarkeshwar Municipality',
                                'wards' => 11,
                            ],
                            [
                                'local_body' => 'दक्षिणकाली नगरपालिका',
                                'local_body_en' => 'Dakshinkali Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'नागार्जुन नगरपालिका',
                                'local_body_en' => 'Nagarjuna Municipality',
                                'wards' => 10,
                            ],
                            [
                                'local_body' => 'बुढानिलकण्ठ नगरपालिका',
                                'local_body_en' => 'Budhanilkantha Municipality',
                                'wards' => 13,
                            ],
                            [
                                'local_body' => 'शङ्खरापुर नगरपालिका',
                                'local_body_en' => 'Shankharapur Municipality',
                                'wards' => 9,
                            ],

                        ]), ],
                    ['district_en' => 'Kavrepalanchok', 'district' => 'काभ्रेपलान्चोक',
                        'localBodies' => collect([

                            [
                                'local_body' => 'धुलिखेल नगरपालिका',
                                'local_body_en' => 'Dhulikhel Municipality',
                                'wards' => 12,
                            ],
                            [
                                'local_body' => 'बनेपा नगरपालिका',
                                'local_body_en' => 'Banepa Municipality',
                                'wards' => 14,
                            ],
                            [
                                'local_body' => 'पनौती नगरपालिका',
                                'local_body_en' => 'Panauti Municipality',
                                'wards' => 12,
                            ],
                            [
                                'local_body' => 'पाँचखाल नगरपालिका',
                                'local_body_en' => 'Panchkhal Municipality',
                                'wards' => 13,
                            ],
                            [
                                'local_body' => 'नमोबुद्ध नगरपालिका',
                                'local_body_en' => 'Namobuddha Municipality',
                                'wards' => 11,
                            ],
                            [
                                'local_body' => 'मण्डनदेउपुर नगरपालिका',
                                'local_body_en' => 'Mandandeupur Municipality',
                                'wards' => 12,
                            ],
                            [
                                'local_body' => 'खानीखोला गाउँपालिका',
                                'local_body_en' => 'Khanikhola Rural municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'चौंरीदेउराली गाउँपालिका',
                                'local_body_en' => 'Chaurideurali Rural municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'तेमाल गाउँपालिका',
                                'local_body_en' => 'Temal Rural municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'बेथानचोक गाउँपालिका',
                                'local_body_en' => 'Bethanchowk Rural municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'भुम्लु गाउँपालिका',
                                'local_body_en' => 'Bhumlu Rural municipality',
                                'wards' => 10,
                            ],
                            [
                                'local_body' => 'महाभारत गाउँपालिका',
                                'local_body_en' => 'Mahabharat Rural municipality',
                                'wards' => 8,
                            ],
                            [
                                'local_body' => 'रोशी गाउँपालिका',
                                'local_body_en' => 'Roshi Rural municipality',
                                'wards' => 12,
                            ],
                        ]), ],
                    ['district_en' => 'Lalitpur', 'district' => 'ललितपुर',
                        'localBodies' => collect([

                            [
                                'local_body' => 'ललितपुर महानगरपालिका',
                                'local_body_en' => 'Lalitpur Metropolitan',
                                'wards' => 29,
                            ],
                            [
                                'local_body' => 'गोदावरी नगरपालिका',
                                'local_body_en' => 'Godavari Municipality',
                                'wards' => 14,
                            ],
                            [
                                'local_body' => 'महालक्ष्मी नगरपालिका',
                                'local_body_en' => 'Mahalakshmi Municipality',
                                'wards' => 10,
                            ],

                            [
                                'local_body' => 'कोन्ज्योसोम गाउँपालिका',
                                'local_body_en' => 'Konjyosom Rural municipality',
                                'wards' => 5,
                            ],
                            [
                                'local_body' => 'बागमती गाउँपालिका',
                                'local_body_en' => 'Bagmati Rural municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'महाङ्काल गाउँपालिका',
                                'local_body_en' => 'Mahankal Rural municipality',
                                'wards' => 6,
                            ],
                        ]), ],
                    ['district_en' => 'Nuwakot', 'district' => 'नुवाकोट',
                        'localBodies' => collect([
                            [
                                'local_body' => 'विदुर नगरपालिका',
                                'local_body_en' => 'Vidur Municipality',
                                'wards' => 13,
                            ],
                            [
                                'local_body' => 'बेलकोटगढी नगरपालिका',
                                'local_body_en' => 'Belkotgadhi Municipality',
                                'wards' => 13,
                            ],
                            [
                                'local_body' => 'ककनी गाउँपालिका',
                                'local_body_en' => 'Kakani Rural municipality',
                                'wards' => 8,
                            ],
                            [
                                'local_body' => 'किस्पाङ गाउँपालिका',
                                'local_body_en' => 'Kispang Rural municipality',
                                'wards' => 5,
                            ],
                            [
                                'local_body' => 'तादी गाउँपालिका',
                                'local_body_en' => 'Tadi Rural municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'तारकेश्वर गाउँपालिका',
                                'local_body_en' => 'Tarkeshwar Rural municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'दुप्चेश्वर गाउँपालिका',
                                'local_body_en' => 'Dupcheshwor Rural municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'पञ्चकन्या गाउँपालिका',
                                'local_body_en' => 'Panchakanya Rural municipality',
                                'wards' => 5,
                            ],
                            [
                                'local_body' => 'लिखु गाउँपालिका',
                                'local_body_en' => 'Likhu Rural municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'म्यगङ गाउँपालिका',
                                'local_body_en' => 'Myagang Rural municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'शिवपुरी गाउँपालिका',
                                'local_body_en' => 'Shivpuri Rural municipality',
                                'wards' => 8,
                            ],
                            [
                                'local_body' => 'सुर्यगढी गाउँपालिका',
                                'local_body_en' => 'Suryagadhi Rural municipality',
                                'wards' => 5,
                            ],

                        ]), ],
                    ['district_en' => 'Rasuwa', 'district' => 'रसुवा',
                        'localBodies' => collect([
                            [
                                'local_body' => 'उत्तरगया गाउँपालिका',
                                'local_body_en' => 'Uttargaya Rural municipality',
                                'wards' => 5,
                            ],
                            [
                                'local_body' => 'कालिका गाउँपालिका',
                                'local_body_en' => 'Kalika Rural municipality',
                                'wards' => 5,
                            ],
                            [
                                'local_body' => 'गोसाईकुण्ड गाउँपालिका',
                                'local_body_en' => 'Gosaikunda Rural municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'नौकुण्ड गाउँपालिका',
                                'local_body_en' => 'Naukunda Rural municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'आमाछोदिङमो गाउँपालिका',
                                'local_body_en' => 'Amachhoding Rural municipality',
                                'wards' => 5,
                            ],
                        ]), ],
                    ['district_en' => 'Sindhupalchok', 'district' => 'सिन्धुपाल्चोक',
                        'localBodies' => collect([
                            [
                                'local_body' => 'चौतारा साँगाचोकगढी नगरपालिका',
                                'local_body_en' => 'Chautara Sangachokgadhi Municipality',
                                'wards' => 14,
                            ],
                            [
                                'local_body' => 'बाह्रविसे नगरपालिका',
                                'local_body_en' => 'Barhavise Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'मेलम्ची नगरपालिका',
                                'local_body_en' => 'Melamchi Municipality',
                                'wards' => 13,
                            ],
                            [
                                'local_body' => 'ईन्द्रावती गाउँपालिका',
                                'local_body_en' => 'Indravati Rural municipality',
                                'wards' => 12,
                            ],
                            [
                                'local_body' => 'जुगल गाउँपालिका',
                                'local_body_en' => 'Jugal Rural municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'पाँचपोखरी थाङपाल गाउँपालिका',
                                'local_body_en' => ' Panchpokhari Thangpal Rural municipality',
                                'wards' => 8,
                            ],
                            [
                                'local_body' => 'बलेफी गाउँपालिका',
                                'local_body_en' => 'Balefi Rural municipality',
                                'wards' => 8,
                            ],
                            [
                                'local_body' => 'भोटेकोशी गाउँपालिका',
                                'local_body_en' => 'Bhotekoshi Rural municipality',
                                'wards' => 5,
                            ],
                            [
                                'local_body' => 'लिसङ्खु पाखर गाउँपालिका',
                                'local_body_en' => 'Lisankhu Pakhar Rural municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'सुनकोशी गाउँपालिका',
                                'local_body_en' => 'Sunkoshi Rural municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'हेलम्बु गाउँपालिका',
                                'local_body_en' => 'Helambu Rural municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'त्रिपुरासुन्दरी गाउँपालिका',
                                'local_body_en' => 'Tripura Sundari Rural municipality',
                                'wards' => 6,
                            ],
                        ]), ],
                    ['district_en' => 'Chitwan', 'district' => 'चितवन',
                        'localBodies' => collect([
                            [
                                'local_body' => 'भरतपुर महानगरपालिका',
                                'local_body_en' => 'Bharatpur Metropolitan',
                                'wards' => 29,
                            ],
                            [
                                'local_body' => 'कालिका नगरपालिका',
                                'local_body_en' => 'Kalika Municipality',
                                'wards' => 11,
                            ],
                            [
                                'local_body' => 'खैरहनी नगरपालिका',
                                'local_body_en' => 'Khairhani Municipality',
                                'wards' => 13,
                            ],
                            [
                                'local_body' => 'माडी नगरपालिका',
                                'local_body_en' => 'Madi Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'रत्ननगर नगरपालिका',
                                'local_body_en' => 'Ratnanagar Municipality',
                                'wards' => 16,
                            ],
                            [
                                'local_body' => 'राप्ती नगरपालिका',
                                'local_body_en' => 'Rapti Municipality',
                                'wards' => 13,
                            ],
                            [
                                'local_body' => 'इच्छाकामना गाउँपालिका',
                                'local_body_en' => 'Ichhakamana Rural municipality',
                                'wards' => 7,
                            ],
                        ]), ],
                    ['district_en' => 'Makwanpur', 'district' => 'मकवानपुर',
                        'localBodies' => collect([
                            [
                                'local_body' => 'हेटौडा महानगरपालिका',
                                'local_body_en' => 'Hetauda Metropolitan',
                                'wards' => 19,
                            ],
                            [
                                'local_body' => 'थाहा नगरपालिका',
                                'local_body_en' => 'Thaha Municipality',
                                'wards' => 12,
                            ],
                            [
                                'local_body' => 'इन्द्रसरोबर गाउँपालिका',
                                'local_body_en' => 'Indrasarobar Rural municipality',
                                'wards' => 5,
                            ],
                            [
                                'local_body' => 'कैलाश गाउँपालिका',
                                'local_body_en' => 'Kailash Rural municipality',
                                'wards' => 10,
                            ],
                            [
                                'local_body' => 'बकैया गाउँपालिका',
                                'local_body_en' => 'Bakaiya Rural municipality',
                                'wards' => 12,
                            ],
                            [
                                'local_body' => 'बाग्मति गाउँपालिका',
                                'local_body_en' => 'Bagmati Rural municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'भिमफेदी गाउँपालिका',
                                'local_body_en' => 'Bhimphedi Rural municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'मकवानपुरगढी गाउँपालिका',
                                'local_body_en' => 'Makwanpurgadhi Rural municipality',
                                'wards' => 8,
                            ],
                            [
                                'local_body' => 'मनहरी गाउँपालिका',
                                'local_body_en' => 'Manhari Rural municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'राक्सिराङ्ग गाउँपालिका',
                                'local_body_en' => 'Raksirang Rural municipality',
                                'wards' => 9,
                            ],
                        ]), ],
                ]),
            ],
            [
                'province' => 'गण्डकी प्रदेश',
                'province_en' => 'Gandaki Province',
                'districts' => collect([
                    ['district_en' => 'Baglung', 'district' => 'बागलुङ',
                        'localBodies' => collect([
                            [
                                'local_body' => 'बागलुङ नगरपालिका',
                                'local_body_en' => 'Baglung Municipality',
                                'wards' => 14,
                            ],
                            [
                                'local_body' => 'गल्कोट नगरपालिका',
                                'local_body_en' => 'Galkot Municipality',
                                'wards' => 11,
                            ],
                            [
                                'local_body' => 'जैमूनी नगरपालिका',
                                'local_body_en' => 'Jaimuni Municipality',
                                'wards' => 10,
                            ],
                            [
                                'local_body' => 'ढोरपाटन नगरपालिका',
                                'local_body_en' => 'Dhorpatan Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'वरेङ गाउँपालिका',
                                'local_body_en' => 'Wareng Rural municipality',
                                'wards' => 5,
                            ],
                            [
                                'local_body' => 'काठेखोला गाउँपालिका',
                                'local_body_en' => 'Kathekhola Rural municipality',
                                'wards' => 8,
                            ],
                            [
                                'local_body' => 'तमानखोला गाउँपालिका',
                                'local_body_en' => 'Tamankhola Rural municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'ताराखोला गाउँपालिका',
                                'local_body_en' => 'Tarakhola Rural municipality',
                                'wards' => 5,
                            ],
                            [
                                'local_body' => 'निसीखोला गाउँपालिका',
                                'local_body_en' => 'Nisikhola Rural municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'वडिगाड गाउँपालिका',
                                'local_body_en' => 'Wadigad Rural municipality',
                                'wards' => 10,
                            ],

                        ]), ],
                    ['district_en' => 'Gorkha', 'district' => 'गोरखा',
                        'localBodies' => collect([
                            [
                                'local_body' => 'गोरखा नगरपालिका',
                                'local_body_en' => 'Gorkha Municipality',
                                'wards' => 14,
                            ],
                            [
                                'local_body' => 'पालुङटार नगरपालिका',
                                'local_body_en' => 'Palungtar Municipality',
                                'wards' => 10,
                            ],
                            [
                                'local_body' => 'बारपाक सुलिकोट गाउँपालिका',
                                'local_body_en' => 'Barpak Sulikot Rural municipality',
                                'wards' => 8,
                            ],
                            [
                                'local_body' => 'सिरानचोक गाउँपालिका',
                                'local_body_en' => 'Siranchowk Rural municipality',
                                'wards' => 8,
                            ],
                            [
                                'local_body' => 'अजिरकोट गाउँपालिका',
                                'local_body_en' => 'Ajirkot Rural municipality',
                                'wards' => 5,
                            ],
                            [
                                'local_body' => 'आरूघाट गाउँपालिका',
                                'local_body_en' => 'Arughat Rural municipality',
                                'wards' => 10,
                            ],
                            [
                                'local_body' => 'गण्डकी गाउँपालिका',
                                'local_body_en' => 'Gandaki Rural municipality',
                                'wards' => 8,
                            ],
                            [
                                'local_body' => 'चुमनुव्री गाउँपालिका',
                                'local_body_en' => 'Chumanuvri Rural municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'धार्चे गाउँपालिका',
                                'local_body_en' => 'Dharche Rural municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'भिमसेनथापा गाउँपालिका',
                                'local_body_en' => 'Bhimsenthapa Rural municipality',
                                'wards' => 8,
                            ],
                            [
                                'local_body' => 'शहिद लखन गाउँपालिका',
                                'local_body_en' => 'Shahid Lakhan Rural municipality',
                                'wards' => 9,
                            ],

                        ]), ],
                    ['district_en' => 'Kaski', 'district' => 'कास्की',
                        'localBodies' => collect([
                            [
                                'local_body' => 'पोखरा महानगरपालिका',
                                'local_body_en' => 'Pokhara Metropolitan',
                                'wards' => 33,
                            ],
                            [
                                'local_body' => 'अन्नपूर्ण गाउँपालिका',
                                'local_body_en' => 'Annapurna Rural municipality',
                                'wards' => 11,
                            ],
                            [
                                'local_body' => 'माछापुच्छ्रे गाउँपालिका',
                                'local_body_en' => 'Machhapuchhre Rural municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'मादी गाउँपालिका',
                                'local_body_en' => 'Madi Rural municipality',
                                'wards' => 12,
                            ],
                            [
                                'local_body' => 'रूपा गाउँपालिका',
                                'local_body_en' => 'Rupa Rural municipality',
                                'wards' => 7,
                            ],
                        ]), ],
                    ['district_en' => 'Lamjung', 'district' => 'लमजुङ',
                        'localBodies' => collect([
                            [
                                'local_body' => 'बेसीशहर नगरपालिका',
                                'local_body_en' => 'Besishahar Municipality',
                                'wards' => 11,
                            ],
                            [
                                'local_body' => 'मध्यनेपाल नगरपालिका',
                                'local_body_en' => 'Central Nepal Municipality',
                                'wards' => 10,
                            ],
                            [
                                'local_body' => 'रार्इनास नगरपालिका',
                                'local_body_en' => 'Rarinas Municipality',
                                'wards' => 10,
                            ],
                            [
                                'local_body' => 'सुन्दरबजार नगरपालिका',
                                'local_body_en' => 'Sunderbazar Municipality',
                                'wards' => 11,
                            ],
                            [
                                'local_body' => 'क्व्होलासोथार गाउँपालिका',
                                'local_body_en' => 'Kwalasothar Rural municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'दूधपोखरी गाउँपालिका',
                                'local_body_en' => 'Dudhpokhari Rural municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'दोर्दी गाउँपालिका',
                                'local_body_en' => 'Dordi Rural municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'मर्स्याङदी गाउँपालिका',
                                'local_body_en' => 'Marsyangdi Rural municipality',
                                'wards' => 9,
                            ],
                        ]), ],
                    ['district_en' => 'Manang', 'district' => 'मनाङ',
                        'localBodies' => collect([
                            [
                                'local_body' => 'चामे गाउँपालिका',
                                'local_body_en' => 'Chame Rural Municipality',
                                'wards' => 5,
                            ],
                            [
                                'local_body' => 'नार्पा भूमि गाउँपालिका',
                                'local_body_en' => 'Narp Bhumi Rural Municipality',
                                'wards' => 5,
                            ],
                            [
                                'local_body' => 'नासोँ गाउँपालिका',
                                'local_body_en' => 'Nason Rural Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'मनाङ ङिस्याङ गाउँपालिका',
                                'local_body_en' => 'Manang Ngisyang Rural Municipality',
                                'wards' => 9,
                            ],

                        ]), ],
                    ['district_en' => 'Mustang', 'district' => 'मुस्ताङ',
                        'localBodies' => collect([
                            [
                                'local_body' => 'घरपझोङ गाउँपालिका',
                                'local_body_en' => 'Gharpajhong Rural Municipality',
                                'wards' => 5,
                            ],
                            [
                                'local_body' => 'थासाङ गाउँपालिका',
                                'local_body_en' => 'Thasang Rural Municipality',
                                'wards' => 5,
                            ],
                            [
                                'local_body' => 'लो-घेकर दामोदरकुण्ड गाउँपालिका',
                                'local_body_en' => ' Lo-Ghekar Damodarkund Rural Municipality',
                                'wards' => 5,
                            ],
                            [
                                'local_body' => 'लोमन्थाङ गाउँपालिका',
                                'local_body_en' => 'Lomanthang Rural Municipality',
                                'wards' => 5,
                            ],
                            [
                                'local_body' => 'वारागुङ मुक्तिक्षेत्र गाउँपालिका',
                                'local_body_en' => 'Waragung Muktichhetra Rural Municipality',
                                'wards' => 5,
                            ],
                        ]), ],
                    ['district_en' => 'Myagdi', 'district' => 'म्याग्दी',
                        'localBodies' => collect([
                            [
                                'local_body' => 'बेनी नगरपालिका',
                                'local_body_en' => 'Beni Municipality',
                                'wards' => 10,
                            ],
                            [
                                'local_body' => 'अन्नपुर्ण गाउँपालिका',
                                'local_body_en' => 'Annapurna Rural Municipality',
                                'wards' => 8,
                            ],
                            [
                                'local_body' => 'धवलागिरी गाउँपालिका',
                                'local_body_en' => 'Dhawalagiri Rural Municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'मंगला गाउँपालिका',
                                'local_body_en' => 'Mangala Rural Municipality',
                                'wards' => 5,
                            ],
                            [
                                'local_body' => 'मालिका गाउँपालिका',
                                'local_body_en' => 'Malika Rural Municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'रघुगंगा गाउँपालिका',
                                'local_body_en' => 'Raghuganga Rural Municipality',
                                'wards' => 8,
                            ],
                        ]), ],
                    ['district_en' => 'Nawalpur', 'district' => 'नवलपुर',
                        'localBodies' => collect([
                            [
                                'local_body' => 'कावासोती नगरपालिका',
                                'local_body_en' => 'Kawasoti Municipality',
                                'wards' => 17,
                            ],
                            [
                                'local_body' => 'गैडाकोट नगरपालिका',
                                'local_body_en' => 'Gaidakot Municipality',
                                'wards' => 18,
                            ],
                            [
                                'local_body' => 'देवचुली नगरपालिका',
                                'local_body_en' => 'Devachuli Municipality',
                                'wards' => 17,
                            ],
                            [
                                'local_body' => 'मध्यविन्दु नगरपालिका',
                                'local_body_en' => 'Madhyabindu Municipality',
                                'wards' => 15,
                            ],
                            [
                                'local_body' => 'बौदीकाली गाउँपालिका',
                                'local_body_en' => 'Baudikali Rural Municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'बुलिङटार गाउँपालिका',
                                'local_body_en' => 'Bulingtar Rural Municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'विनयी त्रिवेणी गाउँपालिका',
                                'local_body_en' => 'Binai Triveni Rural Municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'हुप्सेकोट गाउँपालिका',
                                'local_body_en' => 'Hupsekot Rural Municipality',
                                'wards' => 6,
                            ],
                        ]), ],
                    ['district_en' => 'Parbat', 'district' => 'पर्वत',
                        'localBodies' => collect([

                            [
                                'local_body' => 'कुश्मा नगरपालिका',
                                'local_body_en' => 'Kushma Municipality',
                                'wards' => 14,
                            ],
                            [
                                'local_body' => 'फलेवास नगरपालिका',
                                'local_body_en' => 'Phalewas Municipality',
                                'wards' => 11,
                            ],
                            [
                                'local_body' => 'जलजला गाउँपालिका',
                                'local_body_en' => 'Jaljala Rural Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'पैयूं गाउँपालिका',
                                'local_body_en' => 'Paiyun Rural Municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'महाशिला गाउँपालिका',
                                'local_body_en' => 'Mahashila Rural Municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'मोदी गाउँपालिका',
                                'local_body_en' => 'Modi Rural Municipality',
                                'wards' => 8,
                            ],
                            [
                                'local_body' => 'विहादी गाउँपालिका',
                                'local_body_en' => 'Vihadi Rural Municipality',
                                'wards' => 6,
                            ],
                        ]), ],
                    ['district_en' => 'Syangja', 'district' => 'स्याङग्जा',
                        'localBodies' => collect([
                            [
                                'local_body' => 'गल्याङ नगरपालिका',
                                'local_body_en' => 'Galyang Municipality',
                                'wards' => 11,
                            ],
                            [
                                'local_body' => 'चापाकोट नगरपालिका',
                                'local_body_en' => 'Chapakot Municipality',
                                'wards' => 10,
                            ],
                            [
                                'local_body' => 'पुतलीबजार नगरपालिका',
                                'local_body_en' => 'Putlibazar Municipality',
                                'wards' => 14,
                            ],
                            [
                                'local_body' => 'भीरकोट नगरपालिका',
                                'local_body_en' => 'Bhirkot Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'वालिङ नगरपालिका',
                                'local_body_en' => 'Waling Municipality',
                                'wards' => 14,
                            ],
                            [
                                'local_body' => 'अर्जुनचौपारी गाउँपालिका',
                                'local_body_en' => 'Arjunchaupari Rural Municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'आँधिखोला गाउँपालिका',
                                'local_body_en' => 'Andhikhola Rural Municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'कालीगण्डकी गाउँपालिका',
                                'local_body_en' => 'Kaligandaki Rural Municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'फेदीखोला गाउँपालिका',
                                'local_body_en' => 'Fedikhola Rural Municipality',
                                'wards' => 5,
                            ],
                            [
                                'local_body' => 'बिरुवा गाउँपालिका',
                                'local_body_en' => 'Biruwa Rural Municipality',
                                'wards' => 8,
                            ],
                            [
                                'local_body' => 'हरिनास गाउँपालिका',
                                'local_body_en' => 'Harinas Rural Municipality',
                                'wards' => 7,
                            ],
                        ]), ],
                    ['district_en' => 'Tanahun', 'district' => 'तनहुँ',
                        'localBodies' => collect([

                            [
                                'local_body' => 'भानु नगरपालिका',
                                'local_body_en' => 'Bhanu Municipality',
                                'wards' => 13,
                            ],
                            [
                                'local_body' => 'भिमाद नगरपालिका',
                                'local_body_en' => 'Bhimad Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'व्यास नगरपालिका',
                                'local_body_en' => 'Vyas Municipality',
                                'wards' => 14,
                            ],
                            [
                                'local_body' => 'शुक्लागण्डकी नगरपालिका',
                                'local_body_en' => 'Shuklagand Municipality',
                                'wards' => 12,
                            ],
                            [
                                'local_body' => 'आँबुखैरेनी गाउँपालिका',
                                'local_body_en' => 'Aabukhaireni Rural Municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'ऋषिङ्ग गाउँपालिका',
                                'local_body_en' => 'Rishing Rural Municipality',
                                'wards' => 8,
                            ],
                            [
                                'local_body' => 'घिरिङ गाउँपालिका',
                                'local_body_en' => 'Ghiring Rural Municipality',
                                'wards' => 5,
                            ],
                            [
                                'local_body' => 'देवघाट गाउँपालिका',
                                'local_body_en' => 'Devghat Rural Municipality',
                                'wards' => 5,
                            ],
                            [
                                'local_body' => 'म्याग्दे गाउँपालिका',
                                'local_body_en' => 'Rural Municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'वन्दिपुर गाउँपालिका',
                                'local_body_en' => 'Vandipur Rural Municipality',
                                'wards' => 6,
                            ],
                        ]), ],
                ]),
            ],
            [
                'province' => 'लुम्बिनी प्रदेश',
                'province_en' => 'Lumbini Province',
                'districts' => collect([
                    ['district_en' => 'Kapilvastu', 'district' => 'कपिलवस्तु', 'localBodies' => collect([
                        [
                            'local_body' => 'कपिलवस्तु नगरपालिका',
                            'local_body_en' => 'Kapilvastu Municipality',
                            'wards' => 12,
                        ],
                        [
                            'local_body' => 'बुद्धभुमी नगरपालिका',
                            'local_body_en' => 'Buddhabhumi Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'शिवराज नगरपालिका',
                            'local_body_en' => 'Shivraj Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'महाराजगंज नगरपालिका',
                            'local_body_en' => 'Maharajganj Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'कृष्णनगर नगरपालिका',
                            'local_body_en' => 'Krishnanagar Municipality',
                            'wards' => 12,
                        ],
                        [
                            'local_body' => 'बाणगंगा नगरपालिका',
                            'local_body_en' => 'Banganga Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'मायादेवी गाउँपालिका',
                            'local_body_en' => 'Mayadevi Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'यसोधरा गाउँपालिका',
                            'local_body_en' => 'Yasodhara Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'सुद्धोधन गाउँपालिका',
                            'local_body_en' => 'Suddhodhan Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'विजयनगर गाउँपालिका',
                            'local_body_en' => 'Vijayanagar Rural Municipality',
                            'wards' => 7,
                        ],
                    ])],
                    ['district_en' => 'Parasi', 'district' => 'परासी', 'localBodies' => collect([
                        [
                            'local_body' => 'बर्दघाट नगरपालिका',
                            'local_body_en' => 'Bardaghat Municipality',
                            'wards' => 16,
                        ],
                        [
                            'local_body' => 'रामग्राम नगरपालिका',
                            'local_body_en' => 'Ramgram Municipality',
                            'wards' => 18,
                        ],
                        [
                            'local_body' => 'सुनवल नगरपालिका',
                            'local_body_en' => 'Sunwal Municipality',
                            'wards' => 13,
                        ],
                        [
                            'local_body' => 'सुस्ता गाउँपालिका',
                            'local_body_en' => 'Susta Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'पाल्हीनन्दन गाउँपालिका',
                            'local_body_en' => 'Palhinandan Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'प्रतापपुर गाउँपालिका',
                            'local_body_en' => 'Pratappur Rural Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'सरावल गाउँपालिका',
                            'local_body_en' => 'Sarawal Rural Municipality',
                            'wards' => 7,
                        ],
                    ])],
                    ['district_en' => 'Rupandehi', 'district' => 'रुपन्देही', 'localBodies' => collect([
                        [
                            'local_body' => 'बुटवल उपमहानगरपालिका',
                            'local_body_en' => 'Butwal Sub-metropolitan',
                            'wards' => 19,
                        ],
                        [
                            'local_body' => 'देवदह नगरपालिका',
                            'local_body_en' => 'Devadaha Municipality',
                            'wards' => 12,
                        ],
                        [
                            'local_body' => 'लुम्बिनी सांस्कृतिक नगरपालिका',
                            'local_body_en' => 'Lumbini Cultural Municipality',
                            'wards' => 13,
                        ],
                        [
                            'local_body' => 'सैनामैना नगरपालिका',
                            'local_body_en' => 'Sainamina Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'सिद्धार्थनगर नगरपालिका',
                            'local_body_en' => 'Siddharthnagar Municipality',
                            'wards' => 13,
                        ],
                        [
                            'local_body' => 'तिलोत्तमा नगरपालिका',
                            'local_body_en' => 'Tilotta Municipality',
                            'wards' => 17,
                        ],
                        [
                            'local_body' => 'गैडहवा गाउँपालिका',
                            'local_body_en' => 'Gaidhawa Rural Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'कन्चन गाउँपालिका',
                            'local_body_en' => 'Kanchan Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'कोटहीमाई गाउँपालिका',
                            'local_body_en' => 'Kothimai Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'मर्चवारी गाउँपालिका',
                            'local_body_en' => 'Marchwari Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'मायादेवी गाउँपालिका',
                            'local_body_en' => 'Mayadevi Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'ओमसतिया गाउँपालिका',
                            'local_body_en' => 'Omastiya Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'रोहिणी गाउँपालिका',
                            'local_body_en' => 'Rohini Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'सम्मरीमाई गाउँपालिका',
                            'local_body_en' => 'Sammarimai Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'सियारी गाउँपालिका',
                            'local_body_en' => 'Siyari Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'शुद्धोधन गाउँपालिका',
                            'local_body_en' => 'Shuddhodhan Rural Municipality',
                            'wards' => 7,
                        ],
                    ])],
                    ['district_en' => 'Arghakhanchi', 'district' => 'अर्घाखाँची', 'localBodies' => collect([
                        [
                            'local_body' => 'सन्धिखर्क नगरपालिका',
                            'local_body_en' => 'Sandhikharka Municipality',
                            'wards' => 12,
                        ],
                        [
                            'local_body' => 'शितगंगा नगरपालिका',
                            'local_body_en' => 'Shitganga Municipality',
                            'wards' => 14,
                        ],
                        [
                            'local_body' => 'भूमिकास्थान नगरपालिका',
                            'local_body_en' => 'Bhumikasthan Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'छत्रदेव गाउँपालिका',
                            'local_body_en' => 'Chhatradev Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'पाणिनी गाउँपालिका',
                            'local_body_en' => 'Panini Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'मालारानी गाउँपालिका',
                            'local_body_en' => 'Malarani Rural Municipality',
                            'wards' => 9,
                        ],
                    ])],
                    ['district_en' => 'Gulmi', 'district' => 'गुल्मी', 'localBodies' => collect([
                        [
                            'local_body' => 'मुसिकोट नगरपालिका',
                            'local_body_en' => 'Musikot Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'रेसुङ्गा नगरपालिका',
                            'local_body_en' => 'Resunga Municipality',
                            'wards' => 14,
                        ],
                        [
                            'local_body' => 'ईस्मा गाउँपालिका',
                            'local_body_en' => 'Isma Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'कालीगण्डकी गाउँपालिका',
                            'local_body_en' => 'Kaligandaki Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'गुल्मी दरबार गाउँपालिका',
                            'local_body_en' => 'Gulmi Durbar Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'सत्यवती गाउँपालिका',
                            'local_body_en' => 'Satyawati Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'चन्द्रकोट गाउँपालिका',
                            'local_body_en' => 'Chandrakot Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'रुरुक्षेत्र गाउँपालिका',
                            'local_body_en' => 'Rurukshetra Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'छत्रकोट गाउँपालिका',
                            'local_body_en' => 'Chhatrakot Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'धुर्कोट गाउँपालिका',
                            'local_body_en' => 'Dhurkot Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'मदाने गाउँपालिका',
                            'local_body_en' => 'Madane Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'मालिका गाउँपालिका',
                            'local_body_en' => 'Malika Rural Municipality',
                            'wards' => 8,
                        ],
                    ])],
                    ['district_en' => 'Palpa', 'district' => 'पाल्पा', 'localBodies' => collect([
                        [
                            'local_body' => 'रामपुर नगरपालिका',
                            'local_body_en' => 'Rampur Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'तानसेन नगरपालिका',
                            'local_body_en' => 'Tansen Municipality',
                            'wards' => 14,
                        ],
                        [
                            'local_body' => 'निस्दी गाउँपालिका',
                            'local_body_en' => 'Nisdi Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'पूर्वखोला गाउँपालिका',
                            'local_body_en' => 'Purbakhola Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'रम्भा गाउँपालिका',
                            'local_body_en' => 'Rambha Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'माथागढी गाउँपालिका',
                            'local_body_en' => 'Mathagadhi Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'तिनाउ गाउँपालिका',
                            'local_body_en' => 'Tinau Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'बगनासकाली गाउँपालिका',
                            'local_body_en' => 'Baganaskali Rural Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'रिब्दिकोट गाउँपालिका',
                            'local_body_en' => 'Ribdikot Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'रैनादेवी छहरा गाउँपालिका',
                            'local_body_en' => 'Rainadevi Chhahra Rural Municipality',
                            'wards' => 8,
                        ],
                    ])],
                    ['district_en' => 'Dang', 'district' => 'दाङ', 'localBodies' => collect([
                        [
                            'local_body' => 'तुल्सीपुर नगरपालिका',
                            'local_body_en' => 'Tulsipur Sub-metropolitan',
                            'wards' => 19,
                        ],
                        [
                            'local_body' => 'घोराही नगरपालिका',
                            'local_body_en' => 'Ghorahi Sub-metropolitan',
                            'wards' => 19,
                        ],
                        [
                            'local_body' => 'लमही नगरपालिका',
                            'local_body_en' => 'Lamahi Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'बंगलाचुली गाउँपालिका',
                            'local_body_en' => 'Bangalachuli Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'दंगीशरण गाउँपालिका',
                            'local_body_en' => 'Dangisharan Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'गढवा गाउँपालिका',
                            'local_body_en' => 'Gadhwa Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'राजपुर गाउँपालिका',
                            'local_body_en' => 'Rajpur Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'राप्ती गाउँपालिका',
                            'local_body_en' => 'Rapti Rural Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'शान्तिनगर गाउँपालिका',
                            'local_body_en' => 'Shantinagar Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'बबई गाउँपालिका',
                            'local_body_en' => 'Babai Rural Municipality',
                            'wards' => 7,
                        ],
                    ])],
                    ['district_en' => 'Pyuthan', 'district' => 'प्युठान', 'localBodies' => collect([
                        [
                            'local_body' => 'प्यूठान नगरपालिका',
                            'local_body_en' => 'Pyuthan Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'स्वर्गद्वारी नगरपालिका',
                            'local_body_en' => 'Swargadwari Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'गौमुखी गाउँपालिका',
                            'local_body_en' => 'Gaumukhi Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'माण्डवी गाउँपालिका',
                            'local_body_en' => 'Mandvi Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'सरुमारानी गाउँपालिका',
                            'local_body_en' => 'Sarumarani Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'मल्लरानी गाउँपालिका',
                            'local_body_en' => 'Mallarani Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'नौवहिनी गाउँपालिका',
                            'local_body_en' => 'Nauvahini Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'झिमरुक गाउँपालिका',
                            'local_body_en' => 'Zhimruk Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'ऐरावती गाउँपालिका',
                            'local_body_en' => 'Airavati Rural Municipality',
                            'wards' => 6,
                        ],
                    ])],
                    ['district_en' => 'Rolpa', 'district' => 'रोल्पा', 'localBodies' => collect([
                        [
                            'local_body' => 'रोल्पा नगरपालिका',
                            'local_body_en' => 'Rolpa Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'त्रिवेणी गाउँपालिका',
                            'local_body_en' => 'Triveni Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'परिवर्तन गाउँपालिका',
                            'local_body_en' => 'Parivartan Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'माडी गाउँपालिका',
                            'local_body_en' => 'Madi Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'रुन्टीगढी गाउँपालिका',
                            'local_body_en' => 'Runtigadhi Rural Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'लुङग्री गाउँपालिका',
                            'local_body_en' => 'Lungri Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'गंगादेव गाउँपालिका',
                            'local_body_en' => 'Gangadev Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'सुनछहरी गाउँपालिका',
                            'local_body_en' => 'Sunchahari Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'सुनिल स्मृति गाउँपालिका',
                            'local_body_en' => 'Sunil Smriti Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'थवाङ गाउँपालिका',
                            'local_body_en' => 'Thawang Rural Municipality',
                            'wards' => 5,
                        ],
                    ])],
                    ['district_en' => 'Eastern Rukum', 'district' => 'पूर्वी रूकुम', 'localBodies' => collect([
                        [
                            'local_body' => 'पुथा उत्तरगंगा गाउँपालिका',
                            'local_body_en' => 'Putha Uttarganga Rural Municipality',
                            'wards' => 14,
                        ],
                        [
                            'local_body' => 'भूमे गाउँपालिका',
                            'local_body_en' => 'Bhume Rural Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'सिस्ने गाउँपालिका',
                            'local_body_en' => 'Sisne Rural Municipality',
                            'wards' => 8,
                        ],
                    ])],
                    ['district_en' => 'Banke', 'district' => 'बाँके', 'localBodies' => collect([
                        [
                            'local_body' => 'नेपालगंज उपमहानगरपालिका',
                            'local_body_en' => 'Nepalganj Sub-metropolitan',
                            'wards' => 23,
                        ],
                        [
                            'local_body' => 'कोहलपुर नगरपालिका',
                            'local_body_en' => 'Kohalpur Municipality',
                            'wards' => 15,
                        ],
                        [
                            'local_body' => 'नरैनापुर गाउँपालिका',
                            'local_body_en' => 'Narainapur Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'राप्ती सोनारी गाउँपालिका',
                            'local_body_en' => 'Rapti Sonari Rural Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'बैजनाथ गाउँपालिका',
                            'local_body_en' => 'Baijnath Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'खजुरा गाउँपालिका',
                            'local_body_en' => 'Khajura Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'डुडुवा गाउँपालिका',
                            'local_body_en' => 'Duduwa Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'जानकी गाउँपालिका',
                            'local_body_en' => 'Janaki Rural Municipality',
                            'wards' => 6,
                        ],
                    ])],
                    ['district_en' => 'Bardiya', 'district' => 'बर्दिया', 'localBodies' => collect([
                        [
                            'local_body' => 'गुलरिया नगरपालिका',
                            'local_body_en' => 'Gulariya Municipality',
                            'wards' => 12,
                        ],
                        [
                            'local_body' => 'मधुवन नगरपालिका',
                            'local_body_en' => 'Madhuvan Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'राजापुर नगरपालिका',
                            'local_body_en' => 'Rajapur Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'ठाकुरबाबा नगरपालिका',
                            'local_body_en' => 'Thakur Baba Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'बाँसगढी नगरपालिका',
                            'local_body_en' => 'Bansgadhi Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'बारबर्दिया नगरपालिका',
                            'local_body_en' => 'Barbardia Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'बढैयाताल गाउँपालिका',
                            'local_body_en' => 'Badaiyatal Rural Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'गेरुवा गाउँपालिका',
                            'local_body_en' => 'Geruwa Rural Municipality',
                            'wards' => 6,
                        ],
                    ])],
                ]),
            ],
            [
                'province' => 'कर्णाली प्रदेश',
                'province_en' => 'Karnali Province',
                'districts' => collect([
                    ['district_en' => 'Western Rukum', 'district' => 'पश्चिमी रूकुम',
                        'localBodies' => collect([

                            [
                                'local_body' => 'मुसिकोट नगरपालिका',
                                'local_body_en' => 'Musikot Municipality',
                                'wards' => 14,
                            ],
                            [
                                'local_body' => 'चौरजहारी नगरपालिका',
                                'local_body_en' => 'Chaurajahari Municipality',
                                'wards' => 14,
                            ],
                            [
                                'local_body' => 'आठबिसकोट नगरपालिका',
                                'local_body_en' => 'Athabiscot Municipality',
                                'wards' => 14,
                            ],
                            [
                                'local_body' => 'बाँफिकोट गाउँपालिका',
                                'local_body_en' => 'Banfikot Rural Municipality',
                                'wards' => 10,
                            ],
                            [
                                'local_body' => 'त्रिवेणी गाउँपालिका',
                                'local_body_en' => 'Triveni Rural Municipality',
                                'wards' => 10,
                            ],
                            [
                                'local_body' => 'सानी भेरी गाउँपालिका',
                                'local_body_en' => 'Sani Bheri Rural Municipality',
                                'wards' => 11,
                            ],
                        ]), ],
                    ['district_en' => 'Salyan', 'district' => 'सल्यान',
                        'localBodies' => collect([

                            [
                                'local_body' => 'शारदा नगरपालिका',
                                'local_body_en' => 'Sharda Municipality',
                                'wards' => 15,
                            ],
                            [
                                'local_body' => 'बागचौर नगरपालिका',
                                'local_body_en' => 'Bagchaur Municipality',
                                'wards' => 12,
                            ],
                            [
                                'local_body' => 'बनगाड कुपिण्डे नगरपालिका',
                                'local_body_en' => 'Bangad Kupinde Municipality',
                                'wards' => 12,
                            ],
                            [
                                'local_body' => 'कालिमाटी गाउँपालिका',
                                'local_body_en' => 'Kalimati Rural Municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'त्रिवेणी गाउँपालिका',
                                'local_body_en' => 'Triveni Rural Municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'कपुरकोट गाउँपालिका',
                                'local_body_en' => 'Kapurkot Rural Municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'छत्रेश्वरी गाउँपालिका',
                                'local_body_en' => 'Chhatreswari Rural Municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'सिद्ध कुमाख गाउँपालिका',
                                'local_body_en' => 'Siddha Kumakh Rural Municipality',
                                'wards' => 5,
                            ],
                            [
                                'local_body' => 'कुमाख गाउँपालिका',
                                'local_body_en' => 'Kumakh Rural Municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'दार्मा गाउँपालिका',
                                'local_body_en' => 'Darma Rural Municipality',
                                'wards' => 6,
                            ],
                        ]), ],
                    ['district_en' => 'Dolpa', 'district' => 'डोल्पा',
                        'localBodies' => collect([
                            [
                                'local_body' => 'ठूली भेरी नगरपालिका',
                                'local_body_en' => 'Thuli Bheri Municipality',
                                'wards' => 11,
                            ],
                            [
                                'local_body' => 'त्रिपुरासुन्दरी नगरपालिका',
                                'local_body_en' => 'Tripura Sundari Municipality',
                                'wards' => 11,
                            ],
                            [
                                'local_body' => 'डोल्पो बुद्ध गाउँपालिका',
                                'local_body_en' => 'Dolpo Buddha Rural Municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'शे फोक्सुन्डो गाउँपालिका',
                                'local_body_en' => 'Shey Foksundo Rural Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'जगदुल्ला गाउँपालिका',
                                'local_body_en' => 'Jagadulla Rural Municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'मुड्केचुला गाउँपालिका',
                                'local_body_en' => 'Mudkechula Rural Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'काईके गाउँपालिका',
                                'local_body_en' => 'Kaike Rural Municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'छार्का ताङसोङ गाउँपालिका',
                                'local_body_en' => ' Charka Tangsong Rural Municipality',
                                'wards' => 6,
                            ],
                        ]), ],
                    ['district_en' => 'Humla', 'district' => 'हुम्ला',
                        'localBodies' => collect([
                            [
                                'local_body' => 'सिमकोट गाउँपालिका',
                                'local_body_en' => 'Simkot Rural Municipality',
                                'wards' => 8,
                            ],
                            [
                                'local_body' => 'नाम्खा गाउँपालिका',
                                'local_body_en' => 'Namkha Rural Municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'खार्पुनाथ गाउँपालिका',
                                'local_body_en' => 'Kharpunath Rural Municipality',
                                'wards' => 5,
                            ],
                            [
                                'local_body' => 'सर्केगाड गाउँपालिका',
                                'local_body_en' => 'Sarkegad Rural Municipality',
                                'wards' => 8,
                            ],
                            [
                                'local_body' => 'चंखेली गाउँपालिका',
                                'local_body_en' => 'Chankheli Rural Municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'अदानचुली गाउँपालिका',
                                'local_body_en' => 'Adanchuli Rural Municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'ताँजाकोट गाउँपालिका',
                                'local_body_en' => 'Tanjakot Rural Municipality',
                                'wards' => 5,
                            ],
                        ]), ],
                    ['district_en' => 'Jumla', 'district' => 'जुम्ला',
                        'localBodies' => collect([

                            [
                                'local_body' => 'चन्दननाथ नगरपालिका',
                                'local_body_en' => 'Chandannath Municipality',
                                'wards' => 10,
                            ],
                            [
                                'local_body' => 'कनकासुन्दरी गाउँपालिका',
                                'local_body_en' => 'Kankasundari Rural Municipality',
                                'wards' => 8,
                            ],
                            [
                                'local_body' => 'सिंजा गाउँपालिका',
                                'local_body_en' => 'Sinja Rural Municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'हिमा गाउँपालिका',
                                'local_body_en' => 'Hima Rural Municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'तिला गाउँपालिका',
                                'local_body_en' => 'Tila Rural Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'गुठिचौर गाउँपालिका',
                                'local_body_en' => 'Guthichaur Rural Municipality',
                                'wards' => 5,
                            ],
                            [
                                'local_body' => 'तातोपानी गाउँपालिका',
                                'local_body_en' => 'Tatopani Rural Municipality',
                                'wards' => 8,
                            ],
                            [
                                'local_body' => 'पातारासी गाउँपालिका',
                                'local_body_en' => 'Patarasi Rural Municipality',
                                'wards' => 7,
                            ],
                        ]), ],
                    ['district_en' => 'Kalikot', 'district' => 'कालिकोट',
                        'localBodies' => collect([

                            [
                                'local_body' => 'खाँडाचक्र नगरपालिका',
                                'local_body_en' => 'Khandachakra Municipality',
                                'wards' => 11,
                            ],
                            [
                                'local_body' => 'रास्कोट नगरपालिका',
                                'local_body_en' => 'Raskot Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'तिलागुफा नगरपालिका',
                                'local_body_en' => 'Tilagufa Municipality',
                                'wards' => 11,
                            ],
                            [
                                'local_body' => 'पचालझरना गाउँपालिका',
                                'local_body_en' => 'Pachaljharna Rural Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'सान्नी त्रिवेणी गाउँपालिका',
                                'local_body_en' => 'Sanni Triveni Rural Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'नरहरिनाथ गाउँपालिका',
                                'local_body_en' => 'Narharinath Rural Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => ' शुभ कालीका गाउँपालिका',
                                'local_body_en' => 'Shubh Kalika Rural Municipality',
                                'wards' => 8,
                            ],
                            [
                                'local_body' => 'महावै गाउँपालिका',
                                'local_body_en' => 'Mahawai Rural Municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'पलाता गाउँपालिका',
                                'local_body_en' => 'Palata Rural Municipality',
                                'wards' => 9,
                            ],
                        ]), ],
                    ['district_en' => 'Mugu', 'district' => 'मुगु',
                        'localBodies' => collect([

                            [
                                'local_body' => 'छायाँनाथ रारा नगरपालिका',
                                'local_body_en' => 'Chhayannath Rara Municipality',
                                'wards' => 14,
                            ],
                            [
                                'local_body' => 'मुगुम कार्मारोंग गाउँपालिका',
                                'local_body_en' => 'Mugum Karmarong Rural Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'सोरु गाउँपालिका',
                                'local_body_en' => 'Soru Rural Municipality',
                                'wards' => 11,
                            ],
                            [
                                'local_body' => 'खत्याड गाउँपालिका',
                                'local_body_en' => 'Khatyad Rural Municipality',
                                'wards' => 11,
                            ],
                        ]), ],
                    ['district_en' => 'Surkhet', 'district' => 'सुर्खेत',
                        'localBodies' => collect([
                            [
                                'local_body' => 'बीरेन्द्रनगर नगरपालिका',
                                'local_body_en' => 'Birendranagar Municipality',
                                'wards' => 16,
                            ],
                            [
                                'local_body' => 'भेरीगंगा नगरपालिका',
                                'local_body_en' => 'Bheriganga Municipality',
                                'wards' => 13,
                            ],
                            [
                                'local_body' => 'गुर्भाकोट नगरपालिका',
                                'local_body_en' => 'Gurbhakot Municipality',
                                'wards' => 14,
                            ],
                            [
                                'local_body' => 'पञ्चपुरी नगरपालिका',
                                'local_body_en' => 'Panchpuri Municipality',
                                'wards' => 11,
                            ],
                            [
                                'local_body' => 'लेकवेशी नगरपालिका',
                                'local_body_en' => 'Lekveshi Municipality',
                                'wards' => 10,
                            ],
                            [
                                'local_body' => 'चौकुने गाउँपालिका',
                                'local_body_en' => 'Chowkune Rural Municipality',
                                'wards' => 10,
                            ],
                            [
                                'local_body' => 'बराहताल गाउँपालिका',
                                'local_body_en' => 'Barahatal Rural Municipality',
                                'wards' => 10,
                            ],
                            [
                                'local_body' => 'चिङ्गाड गाउँपालिका',
                                'local_body_en' => 'Chingad Rural Municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'सिम्ता गाउँपालिका',
                                'local_body_en' => 'Simta Rural Municipality',
                                'wards' => 9,
                            ],

                        ]), ],
                    ['district_en' => 'Dailekh', 'district' => 'दैलेख',
                        'localBodies' => collect([

                            [
                                'local_body' => 'नारायण नगरपालिका',
                                'local_body_en' => 'Narayan Municipality',
                                'wards' => 11,
                            ],
                            [
                                'local_body' => 'दुल्लु नगरपालिका',
                                'local_body_en' => 'Dullu Municipality',
                                'wards' => 13,
                            ],
                            [
                                'local_body' => 'चामुण्डा विन्द्रासैनी नगरपालिका',
                                'local_body_en' => 'Chamunda Bindrasaini Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'आठबीस नगरपालिका',
                                'local_body_en' => 'Aathbise Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'भगवतीमाई गाउँपालिका',
                                'local_body_en' => 'Bhagwatimai Rural Municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'गुराँस गाउँपालिका',
                                'local_body_en' => 'Gurans Rural Municipality',
                                'wards' => 8,
                            ],
                            [
                                'local_body' => 'डुंगेश्वर गाउँपालिका',
                                'local_body_en' => 'Dungeshwar Rural Municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'नौमुले गाउँपालिका',
                                'local_body_en' => 'Naumule Rural Municipality',
                                'wards' => 8,
                            ],
                            [
                                'local_body' => 'महावु गाउँपालिका',
                                'local_body_en' => 'Mahavu Rural Municipality',
                                'wards' => 6,
                            ],
                            [
                                'local_body' => 'भैरवी गाउँपालिका',
                                'local_body_en' => 'Bhairavi Rural Municipality',
                                'wards' => 7,
                            ],
                            [
                                'local_body' => 'ठाँटीकाँध गाउँपालिका',
                                'local_body_en' => 'Thantikandh Rural Municipality',
                                'wards' => 6,
                            ],
                        ]), ],
                    ['district_en' => 'Jajarkot', 'district' => 'जाजरकोट',
                        'localBodies' => collect([

                            [
                                'local_body' => 'भेरी नगरपालिका',
                                'local_body_en' => 'Bheri Municipality',
                                'wards' => 13,
                            ],
                            [
                                'local_body' => 'छेडागाड नगरपालिका',
                                'local_body_en' => 'Chhedagad Municipality',
                                'wards' => 13,
                            ],
                            [
                                'local_body' => 'नलगाड नगरपालिका',
                                'local_body_en' => 'Nalgad Municipality',
                                'wards' => 13,
                            ],
                            [
                                'local_body' => 'बारेकोट गाउँपालिका',
                                'local_body_en' => 'Barekot Rural Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'कुसे गाउँपालिका',
                                'local_body_en' => 'Kuse Rural Municipality',
                                'wards' => 9,
                            ],
                            [
                                'local_body' => 'जुनीचाँदे गाउँपालिका',
                                'local_body_en' => 'Junichande Rural Municipality',
                                'wards' => 11,
                            ],
                            [
                                'local_body' => 'शिवालय गाउँपालिका',
                                'local_body_en' => 'Shivalaya Rural Municipality',
                                'wards' => 9,
                            ],
                        ]), ],
                ]),
            ],
            [
                'province' => 'सुदूर-पश्चिम प्रदेश',
                'province_en' => 'Sudurpashchim Province',
                'districts' => collect([
                    ['district_en' => 'Kailali', 'district' => 'कैलाली', 'localBodies' => collect([
                        [
                            'local_body' => 'धनगढी उपमहानगरपालिका',
                            'local_body_en' => 'Dhangadhi Sub-metropolitan',
                            'wards' => 19,
                        ],
                        [
                            'local_body' => 'टिकापुर नगरपालिका',
                            'local_body_en' => 'Tikapur Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'घोडाघोडी नगरपालिका',
                            'local_body_en' => 'Ghodaghodi Municipality',
                            'wards' => 12,
                        ],
                        [
                            'local_body' => 'लम्कीचुहा नगरपालिका',
                            'local_body_en' => 'Lamkichuha Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'भजनी नगरपालिका',
                            'local_body_en' => 'Bhajani Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'गोदावरी नगरपालिका',
                            'local_body_en' => 'Godavari Municipality',
                            'wards' => 12,
                        ],
                        [
                            'local_body' => 'गौरीगंगा नगरपालिका',
                            'local_body_en' => 'Gauriganga Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'जानकी गाउँपालिका',
                            'local_body_en' => 'Janaki Rural Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'बर्दगोरिया गाउँपालिका',
                            'local_body_en' => 'Bardagoria Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'मोहन्याल गाउँपालिका',
                            'local_body_en' => 'Mohanyal Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'कैलारी गाउँपालिका',
                            'local_body_en' => 'Kailari Rural Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'जोशीपुर गाउँपालिका',
                            'local_body_en' => 'Joshipur Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'चुरे गाउँपालिका',
                            'local_body_en' => 'Chure Rural Municipality',
                            'wards' => 6,
                        ],
                    ])],
                    ['district_en' => 'Achham', 'district' => 'अछाम', 'localBodies' => collect([
                        [
                            'local_body' => 'मंगलसेन नगरपालिका',
                            'local_body_en' => 'Mangalsen Municipality',
                            'wards' => 14,
                        ],
                        [
                            'local_body' => 'कमलबजार नगरपालिका',
                            'local_body_en' => 'Kamal Bazar Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'साँफेबगर नगरपालिका',
                            'local_body_en' => 'Sanphebgar Municipality',
                            'wards' => 14,
                        ],
                        [
                            'local_body' => 'पन्चदेवल विनायक नगरपालिका',
                            'local_body_en' => 'Panchdewal Binayak Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'चौरपाटी गाउँपालिका',
                            'local_body_en' => 'Chaurpati Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'मेल्लेख गाउँपालिका',
                            'local_body_en' => 'Mellekh Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'बान्निगढी जयगढ गाउँपालिका',
                            'local_body_en' => 'Bannigadhi Jayagarh Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'रामारोशन गाउँपालिका',
                            'local_body_en' => 'Ramaroshan Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'ढकारी गाउँपालिका',
                            'local_body_en' => 'Dhakari Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'तुर्माखाँद गाउँपालिका',
                            'local_body_en' => 'Turmakhand Rural Municipality',
                            'wards' => 8,
                        ],
                    ])],
                    ['district_en' => 'Doti', 'district' => 'डोटी', 'localBodies' => collect([
                        [
                            'local_body' => 'दिपायल सिलगढी नगरपालिका',
                            'local_body_en' => 'Dipayal Silgadhi Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'शिखर नगरपालिका',
                            'local_body_en' => 'Shikhar Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'पूर्वीचौकी गाउँपालिका',
                            'local_body_en' => 'Purvichowki Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'बडीकेदार गाउँपालिका',
                            'local_body_en' => 'Badikedar Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'जोरायल गाउँपालिका',
                            'local_body_en' => 'Jorayal Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'सायल गाउँपालिका',
                            'local_body_en' => 'Sayal Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'आदर्श गाउँपालिका',
                            'local_body_en' => 'Adarsh Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'के.आई.सिं. गाउँपालिका',
                            'local_body_en' => 'K.I.C. Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'बोगटान फुड्सिल गाउँपालिका',
                            'local_body_en' => 'Bogtan Foodsil Rural Municipality',
                            'wards' => 7,
                        ],
                    ])],
                    ['district_en' => 'Bajhang', 'district' => 'बझाङ', 'localBodies' => collect([
                        [
                            'local_body' => 'जयपृथ्वी नगरपालिका',
                            'local_body_en' => 'Jaya Prithvi Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'बुंगल नगरपालिका',
                            'local_body_en' => 'Bungal Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'तलकोट गाउँपालिका',
                            'local_body_en' => 'Talkot Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'मष्टा गाउँपालिका',
                            'local_body_en' => 'Mashta Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'खप्तडछान्ना गाउँपालिका',
                            'local_body_en' => 'Khaptadchanna Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'थलारा गाउँपालिका',
                            'local_body_en' => 'Thalara Rural Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'वित्थडचिर गाउँपालिका',
                            'local_body_en' => 'Vithadachir Rural Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'सूर्मा गाउँपालिका',
                            'local_body_en' => 'Surma Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'छबिसपाथिभेरा गाउँपालिका',
                            'local_body_en' => 'Chhabispathibhera Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'दुर्गाथली गाउँपालिका',
                            'local_body_en' => 'Durgathali Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'केदारस्युँ गाउँपालिका',
                            'local_body_en' => 'Kedarsyun Rural Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'साइपाल गाउँपालिका',
                            'local_body_en' => 'Saipal Rural Municipality',
                            'wards' => 5,
                        ],
                    ])],
                    ['district_en' => 'Bajura', 'district' => 'बाजुरा', 'localBodies' => collect([
                        [
                            'local_body' => 'बडीमालिका नगरपालिका',
                            'local_body_en' => 'Badimalika Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'त्रिवेणी नगरपालिका',
                            'local_body_en' => 'Triveni Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'बुढीगंगा नगरपालिका',
                            'local_body_en' => 'Budhiganga Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'बुढीनन्दा नगरपालिका',
                            'local_body_en' => 'Budhinanda Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'गौमुल गाउँपालिका',
                            'local_body_en' => 'Gaumul Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'जगन्‍नाथ गाउँपालिका',
                            'local_body_en' => 'Jagannath Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'स्वामीकार्तिक खापर गाउँपालिका',
                            'local_body_en' => 'Swamikartik Khapar Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'खप्तड छेडेदह गाउँपालिका',
                            'local_body_en' => 'Khaptad Chhededah Rural Municipality',
                            'wards' => 7,
                        ],
                        [
                            'local_body' => 'हिमाली गाउँपालिका',
                            'local_body_en' => 'Himali Rural Municipality',
                            'wards' => 7,
                        ],
                    ])],
                    ['district_en' => 'Kanchanpur', 'district' => 'कंचनपुर', 'localBodies' => collect([
                        [
                            'local_body' => 'भीमदत्त नगरपालिका',
                            'local_body_en' => 'Bhimdatta Municipality',
                            'wards' => 19,
                        ],
                        [
                            'local_body' => 'पुर्नवास नगरपालिका',
                            'local_body_en' => 'Punarbas Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'वेदकोट नगरपालिका',
                            'local_body_en' => 'Bedkot Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'दोधारा चादँनी नगरपालिका',
                            'local_body_en' => 'Dodhara Chadani Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'शुक्लाफाँटा नगरपालिका',
                            'local_body_en' => 'Shuklaphanta Municipality',
                            'wards' => 12,
                        ],
                        [
                            'local_body' => 'बेलौरी नगरपालिका',
                            'local_body_en' => 'Belauri Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'कृष्णपुर नगरपालिका',
                            'local_body_en' => 'Krishnapur Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'बेलडाडी गाउँपालिका',
                            'local_body_en' => 'Beldadi Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'लालझाडी गाउँपालिका',
                            'local_body_en' => 'Laljhadi Rural Municipality',
                            'wards' => 6,
                        ],
                    ])],
                    ['district_en' => 'Dadeldhura', 'district' => 'डडेलधुरा', 'localBodies' => collect([
                        [
                            'local_body' => 'अमरगढी नगरपालिका',
                            'local_body_en' => 'Amargadhi Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'परशुराम नगरपालिका',
                            'local_body_en' => 'Parashuram Municipality',
                            'wards' => 12,
                        ],
                        [
                            'local_body' => 'आलिताल गाउँपालिका',
                            'local_body_en' => 'Alital Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'भागेश्वर गाउँपालिका',
                            'local_body_en' => 'Bhageshwor Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'नवदुर्गा गाउँपालिका',
                            'local_body_en' => 'Nawadurga Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'अजयमेरु गाउँपालिका',
                            'local_body_en' => 'Ajaymeru Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'गन्यापधुरा गाउँपालिका',
                            'local_body_en' => 'Ganyapadhura Rural Municipality',
                            'wards' => 5,
                        ],
                    ])],
                    ['district_en' => 'Baitadi', 'district' => 'बैतडी', 'localBodies' => collect([
                        [
                            'local_body' => 'दशरथचन्द नगरपालिका',
                            'local_body_en' => 'Dasharathchanda Municipality',
                            'wards' => 11,
                        ],
                        [
                            'local_body' => 'पाटन नगरपालिका',
                            'local_body_en' => 'Patan Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'मेलौली नगरपालिका',
                            'local_body_en' => 'Melauli Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'पुर्चौडी नगरपालिका',
                            'local_body_en' => 'Purchaudi Municipality',
                            'wards' => 10,
                        ],
                        [
                            'local_body' => 'सुर्नया गाउँपालिका',
                            'local_body_en' => 'Surnaya Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'सिगास गाउँपालिका',
                            'local_body_en' => 'Sigas Rural Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'शिवनाथ गाउँपालिका',
                            'local_body_en' => 'Shivnath Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'पञ्चेश्वर गाउँपालिका',
                            'local_body_en' => 'Pancheshwar Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'दोगडाकेदार गाउँपालिका',
                            'local_body_en' => 'Dogadakedar Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'डीलासैनी गाउँपालिका',
                            'local_body_en' => 'Dilasaini Rural Municipality',
                            'wards' => 7,
                        ],
                    ])],
                    ['district_en' => 'Darchula', 'district' => 'दार्चुला', 'localBodies' => collect([
                        [
                            'local_body' => 'महाकाली नगरपालिका',
                            'local_body_en' => 'Mahakali Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'शैल्यशिखर नगरपालिका',
                            'local_body_en' => 'Shailyashikhar Municipality',
                            'wards' => 9,
                        ],
                        [
                            'local_body' => 'मालिकार्जुन गाउँपालिका',
                            'local_body_en' => 'Malikarjun Rural Municipality',
                            'wards' => 8,
                        ],
                        [
                            'local_body' => 'अपिहिमाल गाउँपालिका',
                            'local_body_en' => 'Apihimal Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'दुहुँ गाउँपालिका',
                            'local_body_en' => 'Duhun Rural Municipality',
                            'wards' => 5,
                        ],
                        [
                            'local_body' => 'नौगाड गाउँपालिका',
                            'local_body_en' => 'Naugad Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'मार्मा गाउँपालिका',
                            'local_body_en' => 'Marma Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'लेकम गाउँपालिका',
                            'local_body_en' => 'Lekam Rural Municipality',
                            'wards' => 6,
                        ],
                        [
                            'local_body' => 'ब्याँस गाउँपालिका',
                            'local_body_en' => 'Byans Rural Municipality',
                            'wards' => 6,
                        ],
                    ])],
                ]),
            ],
        ])->each(function ($province) {
            $newProvince = Province::create([
                'province' => $province['province'],
                'province_en' => $province['province_en'],
            ]);

            $province['districts']->each(function ($district) use ($newProvince) {
                $newDistrict = $newProvince->districts()->create([
                    'district' => $district['district'],
                    'district_en' => $district['district_en'],
                ]);
                $district['localBodies']->each(function ($localBody) use ($newDistrict) {
                    $newDistrict->localBodies()->create([
                        'local_body' => $localBody['local_body'],
                        'local_body_en' => $localBody['local_body_en'],
                        'wards' => $localBody['wards'],
                    ]);
                });
            });
        });
    }
}
