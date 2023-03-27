
import { View, Text } from 'react-native'
import React from 'react'

import {ScrollView,Center,Heading,NativeBaseProvider,} from 'native-base';
import { Image } from 'react-native';
// Native base imports
import { Button } from "native-base";

const ScreenOption2 = ({ navigation }) => {
  return (

    <ScrollView>
      <Center mt="3" mb="4">
        <Heading fontSize="xl">Cat 1</Heading>
      </Center>
      <Center>
        <Image
          style={{ width: 100, height: 100, marginBottom: 10 }}
          source={{
            uri: 'https://s1.ppllstatics.com/lasprovincias/www/multimedia/202112/12/media/cortadas/gatos-kb2-U160232243326NVC-1248x770@Las%20Provincias.jpg',
          }}
        />

        <View style={{ flex: 1, justifyContent: 'center', alignItems: 'center' }}>
          <Text>ScreenOption2</Text>
          <Button mt='5' onPress={() => navigation.goBack()}>Go Back</Button>
        </View>

        <Center mt="8" mb="4">
          <Heading fontSize="xl">Duck 1</Heading>
        </Center>
        <Image
          style={{ width: 170, height: 100, marginBottom: 10 }}
          source={{
            uri: 'https://www.regmurcia.com/servlet/integra.servlets.Imagenes?METHOD=VERIMAGEN_101949&nombre=Pato_de_granja_[Pato]_res_720.jpg',
          }}
        />
        <Center mt="8" mb="4">
          <Heading fontSize="xl"> Dog 1</Heading>
        </Center>
        <Image
          style={{ width: 170, height: 100, marginBottom: 10 }}
          source={{
            uri: 'https://fotografias.lasexta.com/clipping/cmsimages01/2022/08/09/3FFA8546-05CE-4608-9B69-6602D02A4C58/cachorro-pomsky_98.jpg?crop=1183,666,x0,y103&width=1900&height=1069&optimize=high&format=webply',
          }}
        />

        <Center mt="8" mb="4">
          <Heading fontSize="xl"> Cat 2</Heading>
        </Center>
        <Image
          style={{ width: 170, height: 100, marginBottom: 10 }}
          source={{
            uri: 'https://static.tnn.in/photo/msid-93415263,imgsize-491555,width-100,height-200,resizemode-75/93415263.jpg',
          }}
        />

        <Center mt="8" mb="4">
          <Heading fontSize="xl"> Duck 2</Heading>
        </Center>
        <Image
          style={{ width: 170, height: 100, marginBottom: 10 }}
          source={{
            uri: 'https://userscontent2.emaze.com/images/b969780f-0c0a-4e54-85f1-06e8a083e92e/27179507-1c68-4cd0-a5fa-6a847629d2fc.png',
          }}
        />

        <Center mt="8" mb="4">
          <Heading fontSize="xl"> Dog 2</Heading>
        </Center>
        <Image
          style={{ width: 170, height: 100, marginBottom: 10 }}
          source={{
            uri: 'https://www.thekennelclub.org.uk/media/5092/australian-shepherd-puppy.jpg?mode=crop&width=800&height=600&rnd=132957076910000000',
          }}
        />
      </Center>
    </ScrollView>
  );
};



export default ScreenOption2